<template xmlns:h1="http://www.w3.org/1999/html">
    <div class="mypage">
        <div class="mypage__wrap">
            <h1 class="mypage__title">
                <v-icon color="#76c3bf">mdi-human-greeting</v-icon>
                マイページ
            </h1>
            <div class="mypage__content mt-5">
                <v-container>
                    <v-row>
                        <v-col cols="12">
                            <v-card
                                class="mypage__card mypage__card--top"
                                outlined
                            >
                                <v-list-item>
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
                            </v-card>
                        </v-col>

                        <v-col cols="6">
                            <v-card
                                class="mypage__card"
                                outlined
                            >
                                <v-card-title>
                                    メールアドレス
                                </v-card-title>
                                <v-card-content>
                                    sample@example.com
                                </v-card-content>
                            </v-card>
                        </v-col>
                        <v-col cols="6">
                            <v-card
                                class="mypage__card"
                                outlined
                            >
                                <v-card-title>
                                    性別
                                </v-card-title>
                                <v-card-content>
                                </v-card-content>
                            </v-card>
                        </v-col>
                        <v-col cols="6">
                            <v-card
                                class="mypage__card"
                                outlined
                            >
                                <v-card-title>
                                    ペット飼育
                                </v-card-title>
                                <v-card-content>
                                </v-card-content>
                            </v-card>
                        </v-col>
                        <v-col cols="6">
                            <v-card
                                class="mypage__card"
                                outlined
                            >
                                <v-card-title>
                                    ペットの種類
                                </v-card-title>
                                <v-card-content>
                                </v-card-content>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
            <v-divider></v-divider>
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
</style>
