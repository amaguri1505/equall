<template>
    <div class="reset">
        <v-form refs="form">
            <equall-start
                title="パスワード変更用フォーム"
                class="mt-5"
            />
            <v-text-field
                class="mt-5"
                background-color="white"
                single-line
                outlined
                hide-details
                placeholder="登録した際のメールアドレス"
                v-model="email"
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
                パスワード変更用リンクを送信
            </v-btn>
        </v-form>
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
    .reset
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
