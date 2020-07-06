<template>
    <div>
        <div class="login__wrap">
            <equall-logo class="login__logo"/>
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
                @click="login"
            >
                ログイン
            </v-btn>
            <equall-line-login class="mt-5"/>
            <equall-terms class="mt-5"/>
            <div class="text-center mt-5">
                <router-link class="login__link" to="/register">
                    はじめての方はこちら
                </router-link>
            </div>
            <equall-family class="mt-5 login__family"/>
        </div>
    </div>
</template>
<script>
    import EquallLogo from "../atom/EquallLogo";
    import EquallFamily from "../atom/EquallFamily";
    import EquallStart from "../atom/EquallStart";
    import EquallTerms from "../atom/EquallTerms";
    import EquallLineLogin from "../atom/EquallLineLogin";


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
            login() {
                this.$store
                    .dispatch('login', {
                        email: this.email,
                        password: this.password
                    })
                    .then(() => {
                        this.$router.push({name: 'mypage'});
                    })
                    .catch(err => {
                        console.log("error:".err);
                    });
            },
        },
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .login
        &__wrap
            height: calc(100vh - 48px)
            margin-top: 48px
            padding: 40px 20px 0 20px
            background-color: colors(primary)
            position: relative

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
</style>
