<template>
    <v-container fluid class="search-form">
        <v-row justify="space-around">
            <v-checkbox
                dark
                color="#f09299"
                label="猫"
                value="猫"
                v-model="s_pets"
            ></v-checkbox>
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

</style>
