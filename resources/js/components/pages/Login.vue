<template>
    <div class="login">
        <div class="login__wrap">
            <equall-start
                title="イコールにログイン"
                class="mt-5"
            />
            <v-text-field
                class="mt-5"
                background-color="white"
                single-line
                outlined
                hide-details
                placeholder="メールアドレス"
                v-model="email"
            ></v-text-field>
            <v-text-field
                class="mt-5"
                background-color="white"
                single-line
                outlined
                hide-details
                placeholder="パスワード"
                type="password"
                v-model="password"
            ></v-text-field>
            <v-btn
                class="mt-5 login__btn"
                block
                x-large
                color="#f09299"
                dark
                depressed
                @click="submit"
            >
                ログイン
            </v-btn>
            <!--<equall-line-login class="mt-5"/>-->
            <equall-terms class="mt-5"/>
            <div class="text-center mt-5">
                <router-link class="login__link" to="/register">
                    はじめての方はこちら<br>
                    （新規会員登録）
                </router-link>
            </div>
            <div class="text-center mt-5">
                <router-link class="login__remind" to="/reset">
                    パスワードをお忘れの方
                </router-link>
            </div>
        </div>
        <equall-family class="mt-5 login__family"/>
    </div>
</template>
<script>
    import EquallLogo from "../atom/EquallLogo";
    import EquallFamily from "../atom/EquallFamily";
    import EquallStart from "../atom/EquallStart";
    import EquallTerms from "../atom/EquallTerms";
    import EquallLineLogin from "../atom/EquallLineLogin";
    import { mapActions } from 'vuex';


    export default {
        data() {
            return {
                email: '',
                password: '',
                snack_text: '',
                color: '',
            }
        },
        components: {
            EquallLogo,
            EquallFamily,
            EquallStart,
            EquallTerms,
            EquallLineLogin,
        },
        methods: {
            ...mapActions({
                signIn: 'auth/signIn',
            }),

            submit () {
                this.signIn({
                    email: this.email,
                    password: this.password,
                });
            },
        },
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .login
        height: calc(100vh - 48px)
        margin-top: 48px
        padding: 40px 20px 0 20px
        background-color: colors(primary)
        position: relative

        &__wrap
            position: relative
            z-index: 10

        &__family
            position: absolute
            margin: 0
            bottom: 0
            left: 0
            right: 0

        &__link
            color: white

            &:active,
            &:visited,
            &:hover,
            &:link
                color: white

        &__remind
            color: white

            &:active,
            &:visited,
            &:hover,
            &:link
                color: white
</style>
