import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

axios.defaults.baseURL = '/api';

export default new Vuex.Store({
    state: {
        user: null,
        corp: null,
        s_search_word: "",
        s_stations: {},
        s_areas: {},
        s_costs: {},
        s_pets: {},
    },

    mutations: {
        setUserData (state, userData) {
            state.user = userData
            localStorage.setItem('user', JSON.stringify(userData))
            axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
        },

        setCorpData (state, corpData) {
            state.corp = corpData
            localStorage.setItem('corp', JSON.stringify(corpData))
            axios.defaults.headers.common.Authorization = `Bearer ${corpData.token}`
        },

        clearUserData () {
            localStorage.removeItem('user')
            location.reload()
        },

        clearCorpData () {
            localStorage.removeItem('corp')
            location.reload()
        },

        changeSearchWord (state, s_search_word) {
            state.s_search_word = s_search_word;
        },

        changeSearchStations (state, s_stations) {
            state.s_stations = s_stations;
        },

        changeSearchAreas (state, s_areas) {
            state.s_areas = s_areas;
        },

        changeSearchCosts (state, s_costs) {
            state.s_costs = s_costs;
        },

        changeSearchPets (state, s_pets) {
            state.s_pets = s_pets;
        },

    },

    actions: {
        login ({ commit }, credentials) {
            return axios
                .post('/login', credentials)
                .then(({ data }) => {
                    commit('setUserData', data)
                });
        },

        loginCorp ({ commit }, credentials) {
            return axios
                .post('/login-corp', credentials)
                .then(({ data }) => {
                    commit('setCorpData', data)
                });
        },

        logout ({ commit }) {
            commit('clearUserData');
        },

        logoutCorp ({ commit }) {
            commit('clearCorpData');
        },

        addSearchWord (store, s_search_word) {
            store.commit('changeSearchWord', s_search_word);
        },

        addSearchStations (store, s_stations) {
            store.commit('changeSearchStations', s_stations);
        },

        addSearchAreas (store, s_areas) {
            store.commit('changeSearchAreas', s_areas);
        },

        addSearchCosts (store, s_costs) {
            store.commit('changeSearchCosts', s_costs);
        },

        addSearchPets (store, s_pets) {
            store.commit('changeSearchPets', s_pets);
        },

    },

    getters : {
        isLogged: state => !!state.user,
        isLoggedCorp: state => !!state.corp,
    },
});
