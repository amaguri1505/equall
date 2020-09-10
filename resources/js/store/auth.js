import axios from 'axios';
import router from '../router';

export default {
    namespaced: true,

    state: {
        user: null
    },

    getters: {
        user(state) {
            return state.user
        },
    },

    mutations: {
        SET_USER(state, value) {
            state.user = value
        }
    },

    actions: {
        async signIn({dispatch, rootGetters}, credentials) {
            await axios.get('/sanctum/csrf-cookie');
            await axios.post('/login', credentials)
                .catch(error => {
                    dispatch('modifySnackText', 'ログインに失敗しました。ログイン情報を確認してください。', {root: true});
                    dispatch('modifySnackColor', 'warning', {root: true});
                    dispatch('modifySnackbar', true, {root: true});
                });
            await dispatch('me');
            if (rootGetters.isLogged) {
                dispatch('modifySnackText', 'ログインしました。', {root: true});
                dispatch('modifySnackColor', '#76c3bf', {root: true});
                dispatch('modifySnackbar', true, {root: true});
                router.push('/mypage');
            }
        },

        async signOut({dispatch}) {
            await axios.post('/logout')
                .then(response => {
                    dispatch('me');
                    dispatch('modifySnackText', 'ログアウトしました。', {root: true});
                    dispatch('modifySnackColor', '#76c3bf', {root: true});
                    dispatch('modifySnackbar', true, {root: true});
                    router.push('/');
                }).catch(error => {
                    dispatch('modifySnackText', 'ログアウトに失敗しました。', {root: true});
                    dispatch('modifySnackColor', 'warning', {root: true});
                    dispatch('modifySnackbar', true, {root: true});
                });
        },

        async me({commit}) {
            return axios.get('/api/user')
                .then((response) => {
                    commit('SET_USER', response.data);
                }).catch(() => {
                    commit('SET_USER', null);
                });
        },

        async updateUser({commit, dispatch, state}) {
            await axios.post('/api/update-user', state.user)
                .then(response => {
                    commit('SET_USER', response.data);
                    dispatch('modifySnackText', '会員情報を更新しました。', {root: true});
                    dispatch('modifySnackColor', '#76c3bf', {root: true});
                    dispatch('modifySnackbar', true, {root: true});
                })
                .catch(error => {
                    dispatch('modifySnackText', '会員情報の更新に失敗しました。', {root: true});
                    dispatch('modifySnackColor', 'warning', {root: true});
                    dispatch('modifySnackbar', true, {root: true});
                });
        },
    }
}
