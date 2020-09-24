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
                                            color="#ddd"
                                        >
                                            <v-icon
                                                size="50"
                                            >
                                                mdi-camera-plus-outline
                                            </v-icon>
                                        </v-list-item-avatar>

                                        <v-list-item-content>
                                            <div
                                                class="mypage__name-wrap"
                                            >
                                                <span class="mr-1">
                                                {{ equall_user.family_name }}
                                                </span>
                                                <span class="mr-1">
                                                {{ equall_user.first_name }}
                                                </span>
                                            </div>
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
                                <v-card-text
                                    class="mypage__card-content"
                                >
                                    {{ equall_user.email }}
                                </v-card-text>
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
                                <v-card-text
                                    class="mypage__card-content"
                                >
                                    {{ equall_user.gender }}
                                </v-card-text>
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
                                <v-card-text
                                    class="mypage__card-content"
                                >
                                    {{ equall_user.is_pet_owner }}
                                </v-card-text>
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
                                <v-card-text
                                    class="mypage__card-content"
                                >
                                    <div
                                        v-if="equall_user.num_cat"
                                    >
                                        猫：{{ equall_user.num_cat }}頭
                                    </div>
                                    <div
                                        v-if="equall_user.num_large_dog"
                                    >
                                        大型犬：{{ equall_user.num_large_dog }}頭
                                    </div>
                                    <div
                                        v-if="equall_user.num_middle_dog"
                                    >
                                        中型犬：{{ equall_user.num_middle_dog }}頭
                                    </div>
                                    <div
                                        v-if="equall_user.num_small_dog"
                                    >
                                        小型犬：{{ equall_user.num_small_dog }}頭
                                    </div>
                                    <div
                                        v-if="equall_user.num_other"
                                    >
                                        その他：{{ equall_user.num_other }}頭
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-col>
                        <v-col cols="12">
                            <v-card
                                class="mypage__card"
                                flat
                                rounded-0
                            >
                                <v-card-title
                                    class="mypage__card-title"
                                >
                                    お客様の検索条件
                                </v-card-title>
                                <v-card-text
                                    class="mypage__card-content"
                                >
                                    <div>
                                        最寄駅：{{ equall_user.cond_nearest_station }}
                                    </div>
                                    <div>
                                        エリア：{{ equall_user.cond_area }}
                                    </div>
                                    <div>
                                        ご予算：{{ equall_user.cond_limit_cost }}
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-col>
                        <v-col cols="7"></v-col>
                        <v-col cols="5"
                               class="mypage__register-btn-wrap"
                        >
                            <v-btn
                                color="#76c3bf"
                                to="/mypage/edit"
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
            <real-estates
                class="mt-5 mb-5"
                label="あなたにおすすめの物件"
                :properties="latest_properties"
            ></real-estates>
        </div>
    </div>
</template>
<script>
    import RealEstates from "../organism/RealEstates";
    import {mapState} from "vuex";

    export default {
        components: {
            RealEstates,
        },
        data() {
            return {
                latest_properties: [],
                request_cnt: 0,
            }
        },
        computed: mapState({
            equall_user: state => state.auth.user,
        }),
        created() {
            this.$store.dispatch('modifyOverlayWhite', true);
            this.$http
                .post('/api/get-latest-properties', {})
                .then(response => {
                    this.latest_properties = response.data;
                    this.$store.dispatch('modifyOverlayWhite', false);
                })
                .catch(error => {
                    this.$store.dispatch('modifySnackText', '読み込みに失敗しました。リロードしてください。');
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                });
        },
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .mypage
        &__wrap
            margin-top: 48px
            padding: 40px 20px 80px 20px

        &__name-wrap
            text-align: center

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
