import Vue from 'vue';
import Vuex from 'vuex';
import Vuetify from 'vuetify';
import colors from 'vuetify/lib/util/colors';
import axios from 'axios';
import router from './router.js';
import MainPage from './components/pages/MainPage';
import MainPageCorp from './components/pages/corp/MainPage';
import MainPageCorpOnlyHeader from './components/pages/corp/MainPageOnlyHeader';
import store from './store';
import VueLazyload from 'vue-lazyload';
import ja from 'vuetify/es5/locale/ja';

Vue.prototype.$http = axios;

Vue.use(Vuetify);
Vue.use(Vuex);
Vue.use(VueLazyload);

new Vue({
    store,
    router: router,
    vuetify: new Vuetify({
        lang: {
            locales: { ja },
            current: 'ja',
        },
        themes: {
            light: {
                primary: colors.white,
            },
        },
    }),
    components: {
        app: MainPage,
        appcorp: MainPageCorp,
        apponlyheader: MainPageCorpOnlyHeader,
    },
}).$mount('#app');
