<template xmlns:h1="http://www.w3.org/1999/html">
    <div class="mypage">
        <div class="mypage__wrap">
            <h1 class="mypage__title">
                <v-icon color="#76c3bf">mdi-human-greeting</v-icon>
                マイページ
            </h1>
            <v-divider
                class="mt-5"
            ></v-divider>
            <div class="mypage__content mt-5">
                <v-container>
                    <v-row>
                        <v-col cols="12">
                            <v-card
                                class="mypage__card mypage__card--top"
                                outlined
                            >
                                <v-list
                                    color="#edece8"
                                >
                                    <v-list-item
                                        class="mypage__card-list"
                                    >
                                        <v-list-item-avatar
                                            size="80"
                                        >
                                            <v-img src="/images/sample_profile.jpg"></v-img>
                                        </v-list-item-avatar>

                                        <v-list-item-content>
                                            <div>子猫</div>
                                            <div>子猫</div>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-list>
                            </v-card>
                        </v-col>

                        <v-col cols="6">
                            <v-card
                                class="mypage__card"
                                flat
                                rounded-0
                            >
                                <v-card-title
                                    class="mypage__card-title"
                                >
                                    メールアドレス
                                </v-card-title>
                                <v-card-content
                                    class="mypage__card-content"
                                >
                                    sample@example.com
                                </v-card-content>
                            </v-card>
                        </v-col>
                        <v-col cols="6">
                            <v-card
                                class="mypage__card"
                                flat
                                rounded-0
                            >
                                <v-card-title
                                    class="mypage__card-title"
                                >
                                    性別
                                </v-card-title>
                                <v-card-content
                                    class="mypage__card-content"
                                >
                                </v-card-content>
                            </v-card>
                        </v-col>
                        <v-col cols="6">
                            <v-card
                                class="mypage__card"
                                flat
                                rounded-0
                            >
                                <v-card-title
                                    class="mypage__card-title"
                                >
                                    ペット飼育
                                </v-card-title>
                                <v-card-content
                                    class="mypage__card-content"
                                >
                                </v-card-content>
                            </v-card>
                        </v-col>
                        <v-col cols="6">
                            <v-card
                                class="mypage__card"
                                flat
                                rounded-0
                            >
                                <v-card-title
                                    class="mypage__card-title"
                                >
                                    ペットの種類
                                </v-card-title>
                                <v-card-content>
                                </v-card-content>
                            </v-card>
                        </v-col>
                        <v-col cols="7"></v-col>
                        <v-col cols="5"
                               class="mypage__register-btn-wrap"
                        >
                            <v-btn
                                color="#76c3bf"
                                dark
                            >
                                編集ページへ
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
            <v-divider
                class="mt-5"
            ></v-divider>
            <real-estates class="mt-5 mb-5" label="あなたにおすすめの物件"></real-estates>
        </div>
    </div>
</template>
<script>
    import RealEstates from "../organism/RealEstates";

    export default {
        components: {
            RealEstates,
        },
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .mypage
        &__wrap
            margin-top: 48px
            padding: 40px 20px 80px 20px

        &__title
            color: colors(primary)
            text-align: center
            letter-spacing: 0.2rem
            font-size: 1.5rem

        &__avatar
            margin: 0 auto
            display: block

        &__card-content
            padding-left: 8px

        &__card
            &--top
                border-top: 5px solid rgb(240, 146, 153) !important

        &__card-title
            padding: 4px 4px 4px 8px !important
            background-color: rgb(237, 236, 232)
            font-size: 1rem
            border-left: 5px solid rgb(240, 146, 153)

        &__register-btn-wrap
            text-align: center

</style>
