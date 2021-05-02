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
                <div
                    class="search-form__inner"
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
                    <label
                        class="search-form__button"
                    >
                        <input
                            type="checkbox"
                            autocomplete="off"
                            value="猫"
                            v-model="s_pets"
                        >
                        猫
                    </label>
                    <v-checkbox
                        dark
                        color="#f09299"
                        label="小型犬"
                        value="小型犬"
                        v-model="s_pets"
                    ></v-checkbox>
                    <v-checkbox
                        dark
                        color="#f09299"
                        label="中型犬"
                        value="中型犬"
                        v-model="s_pets"
                    ></v-checkbox>
                    <v-checkbox
                        dark
                        color="#f09299"
                        label="大型犬"
                        value="大型犬"
                        v-model="s_pets"
                    ></v-checkbox>
                </div>
            </v-col>
        </v-row>
        <v-row>
            <v-text-field
                v-model="s_search_word"
                background-color="white"
                single-line
                outlined
                hide-details
                class="search-form__text"
                placeholder="地域名、駅名などご入力ください"
            >
                <template v-slot:append>
                    <v-btn
                        depressed
                        tile
                        x-large
                        dark
                        color="#f09299"
                        class="ma-0"
                        @click="search"
                    >
                        検索
                    </v-btn>
                </template>
            </v-text-field>
        </v-row>
    </v-container>
</template>
<style lang="sass">
    .search-form
        background: url("/images/cat_bg.jpg")
</style>
<script>
    export default {
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

        &__title
            text-align: center
            font-size: 48px

        &__text
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

        &__button
            position: relative
            display: block
            height: 50px
            width: 18%
            margin: 0.6% 0.6% 0.6% 0
            padding: 0.7rem 0
            color: #333
            background-color: #fff
            box-shadow: 0 4px #9d9d9d

            &.active
                background-color: #f09299
                box-shadow: 0 0
                margin-top: 6px

            &.focus
                outline: none
                box-shadow: 0 4px #9d9d9d

                &.active
                    box-shadow: none

</style>
