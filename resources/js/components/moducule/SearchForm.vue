<template>
    <v-container fluid class="search-form pb-4">
        <v-row
            justify="center"
        >
            <h1
                class="search-form__title py-5"
            >
                ペットと暮らせるお家を探そう
            </h1>
        </v-row>
        <v-row justify="center">
            <v-col
                cols="12"
            >
                <v-container
                    fluid
                    class="search-form__inner pa-2 ma-0"
                >
                    <v-img
                        class="search-form__image search-form__image--left"
                        src="/images/girl_and_cat.png"
                        alt="女性とねこちゃん"
                    ></v-img>
                    <v-img
                        class="search-form__image search-form__image--right"
                        src="/images/boy_and_dog.png"
                        alt="男性とわんちゃん"
                    ></v-img>
                    <v-row
                        class="search-form__category-title"
                    >
                        <div>
                            <v-icon>
                                mdi-map-marker-outline
                            </v-icon>
                            施設カテゴリ
                        </div>
                    </v-row>
                    <v-row
                        class="search-form__btn-group"
                    >
                        <label
                            class="search-form__button"
                            @click="e => e.target.classList.toggle('active')"
                        >
                            <input
                                type="checkbox"
                                autocomplete="off"
                                value="猫"
                                v-model="s_pets"
                            >
                            <v-icon>
                                mdi-cat
                            </v-icon>
                            猫
                        </label>
                        <label
                            class="search-form__button"
                            @click="e => e.target.classList.toggle('active')"
                        >
                            <input
                                type="checkbox"
                                autocomplete="off"
                                value="小型犬"
                                v-model="s_pets"
                            >
                            <v-icon>
                                mdi-dog
                            </v-icon>
                            小型犬
                        </label>
                        <label
                            class="search-form__button"
                            @click="e => e.target.classList.toggle('active')"
                        >
                            <input
                                type="checkbox"
                                autocomplete="off"
                                value="中型犬"
                                v-model="s_pets"
                            >
                            <v-icon>
                                mdi-dog
                            </v-icon>
                            中型犬
                        </label>
                        <label
                            class="search-form__button"
                            @click="e => e.target.classList.toggle('active')"
                        >
                            <input
                                type="checkbox"
                                autocomplete="off"
                                value="大型犬"
                                v-model="s_pets"
                            >
                            <v-icon>
                                mdi-dog
                            </v-icon>
                            大型犬
                        </label>
                    </v-row>
                    <v-row
                        class="search-form__category-title"
                    >
                        <div>
                            <v-icon>
                                mdi-map-marker-outline
                            </v-icon>
                            フリーワード
                        </div>
                    </v-row>
                    <v-row>
                        <div
                            class="search-form__free-box-wrap"
                        >
                            <v-text-field
                                v-model="s_search_word"
                                background-color="white"
                                single-line
                                outlined
                                hide-details
                                class="search-form__text"
                                placeholder="地域名、駅名などご入力ください"
                            >
                            </v-text-field>
                        </div>
                    </v-row>
                    <v-row>
                        <top-search-detail
                            class="search-form__detail-box"
                        ></top-search-detail>
                    </v-row>
                    <v-row
                        justify="center"
                        class="my-2"
                    >
                        <v-btn
                            class="search-form__submit"
                            depressed
                            tile
                            color="#f09299"
                            @click="search"
                        >
                            <v-icon left>
                                mdi-magnify
                            </v-icon>
                            この条件で検索する
                        </v-btn>
                    </v-row>
                </v-container>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
    import TopSearchDetail from "./TopSearchDetail";
    export default {
        components: {TopSearchDetail},
        computed: {
            s_pets: {
                get() {
                    return this.$store.state.s_pets;
                },
                set(value) {
                    this.$store.dispatch('addSearchPets', value);
                },
            }
        },
        data() {
            return {
                s_search_word: "",
            }
        },
        methods: {
            search: function (event) {
                this.$store.dispatch('addSearchWord', this.s_search_word);
                this.$router.push({
                    path: "/result",
                });
            }
        },
    }
</script>
<style lang="sass">
    .search-form
        background: url("/images/cat_bg.jpg")

        &__title
            text-align: center
            font-size: 48px

        &__text
            width: 100%
            ::placeholder
            font-size: 10px

        .v-input
            &__slot
                padding-right: 1px !important

            &__append-inner
                margin-top: 1px !important

                button
                    height: 54px !important

        &__inner
            position: relative
            background-color: #edece8
            padding: 8px

        &__image
            position: absolute
            bottom: 0
            width: 140px

            &--left
                left: 1rem

            &--right
                right: 1rem

        &__btn-group
            display: flex
            justify-content: center
            text-align: center

        &__button
            position: relative
            display: block
            height: 50px
            width: 23%
            margin: 0.6% 0.6% 0.6% 0
            padding: 0.7rem 0
            color: #333
            background-color: #fff
            box-shadow: 0 4px #9d9d9d
            cursor: pointer
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out

            input
                position: absolute
                clip: rect(0, 0, 0, 0)

            &.active
                background-color: #f09299
                box-shadow: 0 0
                margin-top: 6px

            &.focus
                outline: none
                box-shadow: 0 4px #9d9d9d

                &.active
                    box-shadow: none

        &__submit
            position: relative !important
            display: block !important
            margin: 0 auto !important
            padding-left: 20px !important
            height: 60px !important
            width: 300px !important
            font-size: 20px !important
            color: #fff !important
            background-color: #f09299 !important
            box-shadow: 0 4px #9d585d !important

        &__category-title
            color: #333
            font-weight: bold
            margin-top: 1rem
            margin-left: 1rem
            margin-bottom: 1rem

        &__detail-box
            width: 100%

        &__free-box-wrap
            width: 100%
            padding-left: 1rem
            padding-right: 1rem
</style>
