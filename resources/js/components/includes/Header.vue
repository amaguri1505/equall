<template>
    <div class="header__wrap">
        <v-app-bar dense flat app max-width="540">

            <router-link to="/" tag="img" src="/images/logo.png" class="header__logo"></router-link>

            <v-spacer></v-spacer>

            <v-btn icon to="/bookmark">
                <v-icon>mdi-heart</v-icon>
            </v-btn>

            <v-btn icon to="/mypage">
                <v-icon>mdi-face-profile-woman</v-icon>
            </v-btn>

            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        </v-app-bar>
        <v-navigation-drawer
            v-model="drawer"
            app
            temporary
        >
            <v-list
                dense
            >
                <v-list-item-group
                    v-model="group"
                    active-class="text--accent-4"
                >
                    <v-list-item to="/register" v-if="!isLogged">
                        <v-list-item-title>
                            新規登録
                        </v-list-item-title>
                    </v-list-item>
                    <v-list-item to="/login" v-if="!isLogged">
                        <v-list-item-title">
                            登録済みの方はこちら
                        </v-list-item-title">
                    </v-list-item>
                    <v-list-item to="/bookmark">
                        <v-list-item-title>
                            お気に入り
                        </v-list-item-title>
                    </v-list-item>
                    <v-list-item to="/real-estates-for-cat">
                        <v-list-item-title>
                            ねこちゃん用物件
                        </v-list-item-title>
                    </v-list-item>
                    <v-list-item to="/real-estates-for-dog">
                        <v-list-item-title>
                            わんちゃん用物件
                        </v-list-item-title>
                    </v-list-item>
                    <v-list-item href="https://media.equall.jp" target="_blank">
                        <v-list-item-title>
                            暮らし情報
                        </v-list-item-title>
                    </v-list-item>
                    <v-list-item @click="logout" v-if="isLogged">
                        <v-list-item-title>
                            ログアウト
                        </v-list-item-title>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>
<style lang="sass">
    .header
        &__logo
            height: 30px
            object-fit: contain
            cursor: pointer
        &__wrap
            header
                margin: auto
</style>
<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';

    export default {
        computed: {
            ...mapGetters([
                'isLogged',
            ])
        },
        methods: {
            ...mapActions({
                signIn: 'auth/signOut',
            }),
            logout() {
                this.signIn();
            }
        },
        data: () => ({
            drawer: false,
            group: null,
        }),

        watch: {
            group() {
                this.drawer = false
            },
        },
    }
</script>
