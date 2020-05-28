import Vue from 'vue';
import Vuetify from 'vuetify';
import router from './router.js'

Vue.use(Vuetify);

new Vue({
    router: router,
    vuetify: new Vuetify(),
}).$mount('#app');
