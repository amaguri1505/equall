import Vue from 'vue';
import Vuetify from 'vuetify';
import router from './router.js';
import MainPage from './components/pages/MainPage';

Vue.use(Vuetify);

new Vue({
    router: router,
    vuetify: new Vuetify(),
    components: {
        app: MainPage
    }
}).$mount('#app');
