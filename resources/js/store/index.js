import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

axios.defaults.baseURL = '/api';

export default new Vuex.Store({
    state: {
        user: null,
        s_search_word: "",
    },

    mutations: {
        setUserData (state, userData) {
            state.user = userData
            localStorage.setItem('user', JSON.stringify(userData))
            axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
        },

        clearUserData () {
            localStorage.removeItem('user')
            location.reload()
        },

        changeSearchWord (state, s_search_word) {
            state.s_search_word = s_search_word;
        },
    },

    actions: {
        login ({ commit }, credentials) {
            return axios
                .post('/login', credentials)
                .then(({ data }) => {
                    commit('setUserData', data)
                })
        },

        logout ({ commit }) {
            commit('clearUserData')
        },

        filterProperty (store, s_search_word) {
            store.commit('changeSearchWord', s_search_word);
        },
    },

    getters : {
        isLogged: state => !!state.user
    },
});
