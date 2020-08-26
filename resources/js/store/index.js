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
        snackbar: false,
        snack_color: "",
        snack_text: "",
        overlay: false,
        overlay_white: false,
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

        changeSnackbar (state, snackbar) {
            state.snackbar = snackbar;
        },

        changeSnackColor (state, snack_color) {
            state.snack_color = snack_color;
        },

        changeSnackText (state, snack_text) {
            state.snack_text = snack_text;
        },

        changeOverlay (state, overlay) {
            state.overlay = overlay;
        },

        changeOverlayWhite (state, overlay) {
            state.overlay_white = overlay;
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

        modifySnackbar (store, snackbar) {
            store.commit('changeSnackbar', snackbar);
        },

        modifySnackColor (store, snack_color) {
            store.commit('changeSnackColor', snack_color);
        },

        modifySnackText (store, snack_text) {
            store.commit('changeSnackText', snack_text);
        },

        modifyOverlay (store, overlay) {
            store.commit('changeOverlay', overlay);
        },

        modifyOverlayWhite (store, overlay_white) {
            store.commit('changeOverlayWhite', overlay_white);
        },

    },

    getters : {
        isLogged: state => !!state.auth.user,
        isLoggedCorp: state => !!state.auth_corp.corp,
        snackbar: state => state.snackbar,
        snack_color: state => state.snack_color,
        snack_text: state => state.snack_text,
        overlay: state => state.overlay,
        overlay_white: state => state.overlay_white,
    },
});
