<template>
    <div class="manage-account-info">
        <div class="manage-account-info__wrap">
            <v-card
                class="manage-account-info__card"
                width="100%"
                height="100%"
            >
                <div class="mt-5 manage-account-info__forms">
                    <v-text-field
                        background-color="white"
                        single-line
                        outlined
                        hide-details
                    >
                        <template v-slot:append>
                            <v-btn
                                depressed
                                tile
                                x-large
                                dark
                                color="#f09299"
                                class="ma-0"
                            >
                                変更
                            </v-btn>
                        </template>
                    </v-text-field>
                    <v-text-field
                        background-color="white"
                        single-line
                        outlined
                        hide-details
                    >
                        <template v-slot:append>
                            <v-btn
                                depressed
                                tile
                                x-large
                                dark
                                color="#f09299"
                                class="ma-0"
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
    </div>
</template>

<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .manage-account-info
        height: 100%

        &__text
            text-align: center

        &__wrap
            height: 100%
            position: relative
            padding: 20px

        &__btn-wrap
            text-align: center


</style>
