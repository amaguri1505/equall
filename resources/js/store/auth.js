import axios from 'axios'

export default {
    namespaced: true,

    state: {
        user: null
    },

    getters: {
        user(state) {
            return state.user
        },
    },

    mutations: {
        SET_USER(state, value) {
            state.user = value
        }
    },

    actions: {
        async signIn({dispatch}, credentials) {
            await axios.get('/sanctum/csrf-cookie');
            await axios.post('/login', credentials);
            await dispatch('me');
        },

        async signOut({dispatch}) {
            await axios.post('/logout');
            await dispatch('me');
            window.location.href = "/";
        },

        async me({commit}) {
            return axios.get('/api/user')
                .then((response) => {
                    commit('SET_USER', response.data);
                }).catch(() => {
                    commit('SET_USER', null);
                });
        },

        async updateUser({dispatch}) {
            await axios.post('/api/update-user', state.user)
                .then(response => {
                    commit('SET_USER', response.data);
                })
                .catch(error => {
                    store.dispatch('modifySnackText', '会員情報の更新に失敗しました。');
                    store.dispatch('modifySnackColor', 'warning');
                    store.dispatch('modifySnackbar', true);
                });
        },
    }
}
