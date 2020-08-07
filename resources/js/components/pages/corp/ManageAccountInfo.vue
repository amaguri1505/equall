<template>
    <div class="manage-account-info pa-2">
        <v-card
            class="manage-account-info__card pa-5"
            width="100%"
            height="100%"
        >
            <div class="manage-account-info__forms">
                <v-text-field
                    background-color="white"
                    v-model="current_corp.email"
                    outlined
                    label="メールアドレス"
                    placeholder="メールアドレス"
                    class="mt-5"
                >
                    <template v-slot:append>
                        <v-btn
                            depressed
                            tile
                            x-large
                            dark
                            color="#76c3bf"
                            class="ma-0"
                            @click="submit_email"
                        >
                            変更
                        </v-btn>
                    </template>
                </v-text-field>
                <v-text-field
                    background-color="white"
                    v-model="current_corp.password"
                    outlined
                    label="パスワード"
                    placeholder="パスワード"
                    type="password"
                    class="mt-2"
                >
                    <template v-slot:append>
                        <v-btn
                            depressed
                            tile
                            x-large
                            dark
                            color="#76c3bf"
                            class="ma-0"
                            @click="submit_password"
                        >
                            変更
                        </v-btn>
                    </template>
                </v-text-field>
            </div>
            <div class="manage-account-info__text">
                企業情報（会社名、住所など）を変更したい場合は直接ご連絡ください
            </div>
            <div class="manage-account-info__btn-wrap mt-5">
                <v-btn
                    x-large
                    color="#76c3bf"
                    dark
                    depressed
                    href="mailto:info@equall.jp"
                >
                    担当者へ連絡
                </v-btn>
            </div>

        </v-card>
    </div>
</template>

<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .manage-account-info
        &__text
            text-align: center
            margin-top: 5rem

        &__btn-wrap
            text-align: center
            margin-bottom: 5rem

        .v-input
            &__slot
                padding-right: 1px !important

            &__append-inner
                margin-top: 1px !important

                button
                    height: 54px !important


</style>

<script>
    export default {
        data() {
            return {
                current_corp: {
                    email: "",
                    password: "",
                },
            }
        },
        methods: {
            submit_email: function () {
                this.$store.dispatch('modifyOverlay', true);
                this.$http
                    .post('/api/modify-corp-email', this.current_corp)
                    .then(response => {
                        this.$store.dispatch('modifyOverlay', false);
                        this.$store.dispatch('modifySnackText', "メールアドレスを変更しました。");
                        this.$store.dispatch('modifySnackColor', '#76c3bf');
                        this.$store.dispatch('modifySnackbar', true);
                    })
                    .catch(error => {
                        this.$store.dispatch('modifyOverlay', false);
                        this.$store.dispatch('modifySnackText', "メールアドレスの更新に失敗しました。");
                        this.$store.dispatch('modifySnackColor', 'warning');
                        this.$store.dispatch('modifySnackbar', true);
                    });
            },
            submit_password: function () {
                this.$http
                    .post('/api/modify-corp-password', this.current_corp)
                    .then(response => {
                        this.$parent.snack_text = "パスワードを変更しました。";
                        this.$parent.snack_color = "#76c3bf";
                        this.$parent.snackbar = true;
                        this.$store.dispatch('modifyOverlay', false);
                        this.$store.dispatch('modifySnackText', "パスワードを変更しました。");
                        this.$store.dispatch('modifySnackColor', '#76c3bf');
                        this.$store.dispatch('modifySnackbar', true);
                    })
                    .catch(error => {
                        this.$store.dispatch('modifyOverlay', false);
                        this.$store.dispatch('modifySnackText', "パスワードの更新に失敗しました。");
                        this.$store.dispatch('modifySnackColor', 'warning');
                        this.$store.dispatch('modifySnackbar', true);
                    });
            },
        },
        created: {}
    }
</script>
