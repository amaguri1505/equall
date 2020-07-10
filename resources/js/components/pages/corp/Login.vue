<template>
    <div class="corp-login">
        <v-snackbar
            top
            v-model="snackbar"
            :color="snack_color"
        >
            {{ snack_text }}
        </v-snackbar>
        <v-overlay
            :value="overlay"
            z-index="9999"
        >
            <v-progress-circular
                indeterminate
                color="#76c3bf"
            ></v-progress-circular>
        </v-overlay>
        <div class="corp-login__wrap">
            <equall-logo class="corp-login__logo"/>
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

    export default {
        data() {
            return {
                email: '',
                password: '',
                snackbar: false,
                overlay: false,
                snack_color: "black",
                snack_text: "",
            }
        },
        components: {
            EquallLogo,
        },
        methods: {
            login() {
                this.overlay = true;
                this.$store
                    .dispatch('loginCorp', {
                        email: this.email,
                        password: this.password,
                    })
                    .then(() => {
                        // this.$router.push('/corp');
                        this.overlay = false;
                        window.location.href='/corp';
                    })
                    .catch(err => {
                        this.snack_text = "ログインに失敗しました";
                        this.snack_color = "warning";
                        this.snackbar = true;
                        this.overlay = false;
                        console.log("error:".err);
                    });
            },
        },
        created () {
            const loggedInCorp = localStorage.getItem('corp');
            if (loggedInCorp) {
                window.location.href='/corp';
            }
        },
    };
</script>
<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .corp-login
        height: 100vh
        padding: 40px 20px 0 20px
        background-color: rgba(118, 195, 191, 0.5)
        text-align: center
        position: relative

        &__wrap
            margin-top: calc(100vh / 8)

        &__card
            margin-top: 20px

        &__logo
            width: 540px
            margin: 0 auto

</style>
