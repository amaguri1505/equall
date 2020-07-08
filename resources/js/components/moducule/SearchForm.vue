<template>
    <v-container fluid class="search-form">
        <v-row justify="space-around">
            <v-checkbox dark color="#f09299" label="猫" value="radio-1"></v-checkbox>
            <v-checkbox dark color="#f09299" label="小型犬" value="radio-2"></v-checkbox>
            <v-checkbox dark color="#f09299" label="中型犬" value="radio-2"></v-checkbox>
            <v-checkbox dark color="#f09299" label="大型犬" value="radio-2"></v-checkbox>
        </v-row>
        <v-row>
            <v-text-field
                v-model="s_search_word"
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
        data () {
            return {
                s_search_word: "",
            }
        },
        methods: {
            search: function (event) {
                this.$store.dispatch('filterProperty', this.s_search_word);
                this.$router.push({
                    path: "/result",
                });
            }
        }
    }
</script>
<style lang="sass">
    .search-form
        .v-input
            &__slot
                padding-right: 1px !important

            &__append-inner
                margin-top: 1px !important

                button
                    height: 54px !important

</style>
