<template>
    <div class="register">
        <div class="register__wrap">
            <equall-logo class="register__logo"/>
            <equall-start
                title="イコールの利用を始める"
                class="mt-5"
            />
            <v-form
                ref="form"
            >
                <v-text-field
                    class="mt-5"
                    background-color="white"
                    single-line
                    outlined
                    placeholder="メールで始める"
                    v-model="user_info.email"
                    :rules="[rules.required, rules.email]"
                >
                </v-text-field>
                <v-text-field
                    class="mt-2"
                    background-color="white"
                    single-line
                    outlined
                    placeholder="パスワード"
                    v-model="user_info.password"
                    type="password"
                    :rules="[rules.required, rules.password]"
                >
                </v-text-field>
                <v-btn
                    depressed
                    tile
                    x-large
                    block
                    dark
                    color="#f09299"
                    class="ma-0"
                    @click="submit"
                >
                    登録
                </v-btn>
            </v-form>
            <equall-line-login class="mt-5"/>
            <equall-terms class="mt-5"/>
        </div>
        <equall-family class="register__family"/>
    </div>
</template>
<script>
    import EquallLogo from "../atom/EquallLogo";
    import EquallFamily from "../atom/EquallFamily";
    import EquallStart from "../atom/EquallStart";
    import EquallTerms from "../atom/EquallTerms";
    import EquallLineLogin from "../atom/EquallLineLogin";

    export default {
        components: {
            EquallLogo,
            EquallFamily,
            EquallStart,
            EquallTerms,
            EquallLineLogin,
        },
        data() {
            return {
                user_info: [],
                rules: {
                    password: value => (value.length >= 8 && value.length <= 16) || 'パスワードは8文字以上16文字以下に設定してください',
                    required: value => !!value || '必須項目です',
                    email: value => {
                        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        return pattern.test(value) || 'メールアドレスを入力してください'
                    },
                },
            }
        },
        methods: {
            submit() {
                this.$store.dispatch('modifyOverlay', true);
                this.$http.post('/api/register', {
                    email: this.email,
                    name: "TEST_USER_NAME",
                    password: "nyanconyanco",
                }).then(response => {
                    this.$store.dispatch('modifyOverlay', false);
                    this.$store.dispatch('modifySnackText', "[仮]仮登録ページのURLを送信しました");
                    this.$store.dispatch('modifySnackColor', '#76c3bf');
                    this.$store.dispatch('modifySnackbar', true);
                    this.$refs.form.reset();
                    this.$refs.form.resetValidation();
                }).catch(error => {
                    this.$store.dispatch('modifyOverlay', false);
                    this.$store.dispatch('modifySnackText', "登録に失敗しました");
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                });
            },
        },
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .register
        height: calc(100vh - 48px)
        margin-top: 48px
        padding: 40px 20px 0 20px
        background-color: colors(primary)
        position: relative

        &__wrap
            position: relative

            .v-input
                &__slot
                    padding-right: 1px !important

                &__append-inner
                    margin-top: 1px !important

                    button
                        height: 54px !important

        &__family
            position: absolute
            margin: 0
            bottom: 0
            left: 0
            right: 0
</style>
