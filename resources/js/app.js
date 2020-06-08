import Vue from 'vue';
import Vuex from 'vuex';
import Vuetify from 'vuetify';
import axios from 'axios';
import router from './router.js';
import MainPage from './components/pages/MainPage';
import store from './store';

Vue.prototype.$http = axios;

Vue.use(Vuetify);
Vue.use(Vuex);

new Vue({
    store,
    router: router,
    vuetify: new Vuetify(),
    components: {
        app: MainPage
    },
    created() {
        const userInfo = localStorage.getItem('user');
        if (userInfo) {
            const userData = JSON.parse(userInfo);
            this.$store.commit('setUserData', userData);
        }
        axios.interceptors.response.use(
            response => response,
            error => {
                if (error.response.status === 401) {
                    this.$store.dispatch('logout');
                }
                return Promise.reject(error);
            }
        );
    },
}).$mount('#app');
