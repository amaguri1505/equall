<template>
    <div>
        <div class="register__wrap">
            <equall-logo class="register__logo"/>
            <equall-start
                title="イコールの利用を始める"
                class="mt-5"
            />
            <v-form>
                <input type="hidden" name="_token" :value="csrf" />
                <v-text-field
                    class="mt-5"
                    background-color="white"
                    single-line
                    outlined
                    placeholder="メールで始める"
                    v-model="email"
                    :rules="[rules.required, rules.email]"
                >
                    <template v-slot:append>
                        <v-btn
                            depressed
                            tile
                            x-large
                            dark
                            color="#f09299"
                            class="ma-0"
                            @click="submit"
                        >
                            登録
                        </v-btn>
                    </template>
                </v-text-field>
            </v-form>
            <equall-line-login class="mt-0"/>
            <equall-terms class="mt-5"/>
            <equall-family class="mt-5 register__family"/>
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
        components: {
            EquallLogo,
            EquallFamily,
            EquallStart,
            EquallTerms,
            EquallLineLogin,
        },
        data() {
            return {
                email: "",
                rules: {
                    required: value => !!value || '必須項目です',
                    email: value => {
                        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        return pattern.test(value) || 'メールアドレスを入力してください'
                    },
                },
                csrf: document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            }
        },
        methods: {
            submit () {
                this.$http.post('/api/register', {
                    email: this.$data.email,
                })
            },
        },
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .register
        &__wrap
            height: calc(100vh - 48px)
            margin-top: 48px
            padding: 40px 20px 0 20px
            background-color: colors(primary)
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
