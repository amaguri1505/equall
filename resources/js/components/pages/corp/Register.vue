<template>
    <div class="corp-register">
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
            color="white"
            opacity="1.0"
        >
            <v-progress-circular
                indeterminate
                color="#76c3bf"
            ></v-progress-circular>
        </v-overlay>
        <div class="corp-register__wrap">
            <equall-logo class="corp-register__logo"/>
            <v-card
                max-width="540"
                class="corp-register__card mx-auto"
            >
                <v-card-text>
                    <v-form
                        ref="form"
                        lazy-validation
                    >
                        <v-text-field
                            class="mt-5"
                            background-color="white"
                            outlined
                            required
                            hide-details
                            v-model="corp_info.email"
                            label="メールアドレス"
                        ></v-text-field>
                        <v-text-field
                            class="mt-5"
                            background-color="white"
                            outlined
                            type="password"
                            required
                            hide-details
                            v-model="corp_info.password"
                            label="パスワード"
                        ></v-text-field>
                        <v-text-field
                            class="mt-5"
                            background-color="white"
                            outlined
                            hide-details
                            v-model="corp_info.name"
                            label="会社名"
                        ></v-text-field>
                        <v-text-field
                            class="mt-5"
                            background-color="white"
                            outlined
                            hide-details
                            v-model="corp_info.address"
                            label="所在地"
                        ></v-text-field>
                        <v-text-field
                            class="mt-5"
                            background-color="white"
                            outlined
                            hide-details
                            v-model="corp_info.tel"
                            label="事務所電話番号"
                        ></v-text-field>
                        <v-text-field
                            class="mt-5"
                            background-color="white"
                            outlined
                            hide-details
                            v-model="corp_info.license_number"
                            label="免許証番号"
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
                            登録
                        </v-btn>
                    </v-form>
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
                corp_info: [],
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
            submit() {
                this.snack_text = "登録しました";
                this.snack_color = "#76c3bf";
                this.snackbar = true;
                this.$refs.form.reset();
            },
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

    .corp-register
        height: 100vh
        padding: 40px 20px 0 20px
        background-color: rgba(118, 195, 191, 0.5)
        text-align: center
        position: relative

        &__card
            margin-top: 20px

        &__logo
            width: 540px
            margin: 0 auto

</style>
