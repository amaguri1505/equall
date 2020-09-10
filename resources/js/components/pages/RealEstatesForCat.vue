<template>
    <div class="terms">
        <div class="terms__wrap">
            <div class="terms__title">
                <v-icon color="#76c3bf">mdi-alert-circle</v-icon>
                ねこちゃん用物件
            </div>
            <v-divider></v-divider>
            <div class="terms__content pt-2">
                <real-estates
                    class="mt-5 mb-5"
                    label="猫ちゃんと暮らせるおうち"
                    :properties="cats_properties"
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

    export default {
        components: {
            RealEstates,
        },
        data() {
            return {
                cats_properties: [],
            }
        },
        created() {
            this.$store.dispatch('modifyOverlayWhite', true);
            this.$http
                .post('/api/get-latest-properties', {
                    pet_types: 'cat',
                })
                .then(response => {
                    this.cats_properties = response.data;
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
