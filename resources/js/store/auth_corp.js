import axios from 'axios'

export default {
    namespaced: true,

    state: {
        corp: null,
        corp_name: null,
    },

    getters: {
        corp(state) {
            return state.corp;
        },
        corp_name(state) {
            return state.corp_name;
        },
    },

    mutations: {
        SET_CORP(state, value) {
            if (value) {
                state.corp = value;
                state.corp_name = value.name;
            }
        }
    },

    actions: {
        async signIn({dispatch}, credentials) {
            await axios.get('/sanctum/csrf-cookie');
            await axios.post('/corp/login', credentials);
            await dispatch('me');
            window.location.href = "/corp";
        },

        async signOut({dispatch}) {
            await axios.post('/corp/logout');
            await dispatch('me');
            window.location.href = "/corp/login";
        },

        async me({commit}) {
            return axios.get('/api/corp').then((response) => {
                commit('SET_CORP', response.data);
            }).catch(() => {
                commit('SET_CORP', null);
            });
        }
    }
}
