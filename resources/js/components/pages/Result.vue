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
        }

    }
</script>
