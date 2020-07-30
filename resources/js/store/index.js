import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import auth from './auth';
import auth_corp from './auth_corp';

Vue.use(Vuex);

axios.defaults.baseURL = '';

export default new Vuex.Store({
    modules: {
        auth,
        auth_corp,
    },

    state: {
        s_search_word: "",
        s_stations: {},
        s_areas: {},
        s_costs: {},
        s_pets: {},
    },

    mutations: {
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
        isLogged: state => !!state.auth.user,
        isLoggedCorp: state => !!state.auth_corp.corp,
    },
});
