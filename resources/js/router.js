import Vue from 'vue';
import Router from 'vue-router';
import Index from './components/pages/Index';
import Register from './components/pages/Register';
import Login from './components/pages/Login';
import Terms from './components/pages/Terms';
import Relationship from './components/pages/Relationship';
import Bookmark from './components/pages/Bookmark';
import RealEstatesForDog from './components/pages/RealEstatesForDog';
import RealEstatesForCat from './components/pages/RealEstatesForCat';
import Result from './components/pages/Result';
import Detail from './components/pages/Detail';
import MyPage from './components/pages/MyPage';
import PageNotFound from './components/pages/PageNotFound';
import axios from 'axios';

Vue.use(Router);

const guard = function(to, from, next) {
    axios.get('/api/me').then(response => {
        next();
    }).catch(error => {
        window.location.href = "/login";
        // Router.push({ path: "login" });
    });
};

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: Index,
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/terms',
            name: 'terms',
            component: Terms,
        },
        {
            path: '/relationship',
            name: 'relationship',
            component: Relationship,
        },
        {
            path: '/bookmark',
            name: 'bookmark',
            component: Bookmark,
        },
        {
            path: '/real-estates-for-dog',
            name: 'real-estates-for-dog',
            component: RealEstatesForDog,
        },
        {
            path: '/real-estates-for-cat',
            name: 'real-estates-for-cat',
            component: RealEstatesForCat,
        },
        {
            path: '/result',
            name: 'result',
            component: Result,
        },
        {
            path: '/detail',
            name: 'detail',
            component: Detail,
        },
        {
            path: '/mypage',
            name: 'mypage',
            component: MyPage,
            meta: {requiresAuth: true},
            beforeEnter: (to, from, next) => {
                guard(to, from, next);
            },
        },
        {
            path: '*',
            name: 'page-not-found',
            component: PageNotFound,
        },
    ],
    scrollBehavior(to, from, savedPosition) {
        return {x: 0, y: 0}
    },
});
