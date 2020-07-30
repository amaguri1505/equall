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
        signIn({dispatch}, credentials) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', credentials).then(response => {
                    return dispatch('me');
                });
            });
        },

        signOut({dispatch}) {
            axios.post('/logout').then(response =>
            {
                return dispatch('me');
            });
        },

        me({commit}) {
            return axios.get('/api/user').then((response) => {
                commit('SET_USER', response.data);
            }).catch(() => {
                commit('SET_USER', null);
            });
        }
    }
}
