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
import CorpLogin from './components/pages/corp/Login';
import CorpIndex from './components/pages/corp/Index';
import ManageProperty from './components/pages/corp/ManageProperty';
import RegisterProperty from './components/pages/corp/RegisterProperty';
import ManageInquery from './components/pages/corp/ManageInquery';
import ViewAccountInfo from './components/pages/corp/ViewAccountInfo';


Vue.use(Router);

const router = new Router({
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
            meta: {
                auth: true
            },
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
            meta: {
                auth: true
            },
        },
        {
            path: '*',
            name: 'page-not-found',
            component: PageNotFound,
        },
        {
            path: '/corp/login',
            name: 'corp_login',
            component: CorpLogin,
        },
        {
            path: '/corp/',
            name: 'corp_index',
            component: CorpIndex,
        },
        {
            path: '/corp/manage-property/',
            name: 'manage-property',
            component: ManageProperty,
        },
        {
            path: '/corp/register-property/',
            name: 'register-property',
            component: RegisterProperty,
        },
        {
            path: '/corp/manage-inquery/',
            name: 'manage-inquery',
            component: ManageInquery,
        },
        {
            path: '/corp/view-account-info/',
            name: 'view-account-info',
            component: ViewAccountInfo,
        },
    ],
    scrollBehavior(to, from, savedPosition) {
        return {x: 0, y: 0}
    },
});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user');

    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
        next('/login');
    } else {
        next();
    }
});

export default router;
