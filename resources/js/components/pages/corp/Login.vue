<template>
    <div class="corp-login">
        <div class="corp-login__wrap">
            <v-card
                max-width="540"
                class="corp-login__card mx-auto"
            >
                <v-card-text>

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
                    <div class="corp-login__text text-center mt-5">
                        パスワードを忘れた方・変更を希望する方はお問い合わせください
                    </div>
                </v-card-text>
            </v-card>

        </div>
    </div>
</template>
<script>
    import EquallLogo from "../../atom/EquallLogo";
    import EquallFamily from "../../atom/EquallFamily";
    import EquallStart from "../../atom/EquallStart";
    import EquallTerms from "../../atom/EquallTerms";
    import EquallLineLogin from "../../atom/EquallLineLogin";


    export default {
        data() {
            return {
                email: '',
                password: '',
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
    @import "../../../../sass/common/_variable.scss"
    .corp-login
        &__wrap
            height: calc(100vh - 48px)
            margin-top: 48px
            padding: 40px 20px 0 20px
            background-color: rgba(118, 195, 191, 0.2)
            position: relative

        &__card
            margin-top: calc(100vh / 8)

</style>
