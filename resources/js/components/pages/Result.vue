<template>
    <div class="terms">
        <div class="terms__wrap">
            <div class="terms__title">
                あなたの希望にマッチした物件
            </div>
            <v-divider></v-divider>
            <div class="terms__content pt-2">
                <real-estates
                    class="mt-5 mb-5"
                    label="検索結果"
                    :properties="result_properties"
                ></real-estates>
            </div>
        </div>
    </div>
</template>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .terms
        &__wrap
            margin-top: 48px
            padding: 40px 20px 80px 20px

        &__title
            color: colors(primary)
            text-align: center
            letter-spacing: 0.2rem
            font-size: 1.5rem
</style>
<script>
    import RealEstates from "../organism/RealEstates";
    import { mapState } from "vuex";

    export default {
        components: {
            RealEstates,
        },
        data() {
            return {
                result_properties: [],
            }
        },
        computed: {
            ...mapState([
                's_search_word',
                's_pets',
                's_stations',
                's_areas',
                's_under_cost',
                's_limit_cost',
            ])
        },
        created () {
            this.$store.dispatch('modifyOverlayWhite', true);
            this.$http
                .post('/api/search-properties', {
                    s_search_word: this.s_search_word,
                    s_pets: this.s_pets,
                    s_stations: this.s_stations,
                    s_areas: this.s_areas,
                    s_under_cost: this.costs,
                    s_limit_cost: this.costs,
                })
                .then(response => {
                    this.result_properties = response.data;
                    this.$store.dispatch('modifyOverlayWhite', false);
                })
                .catch(error => {
                    this.$store.dispatch('modifySnackText', '読み込みに失敗しました。リロードしてください。');
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                });
        }
    }
</script>
