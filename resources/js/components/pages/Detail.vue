<template>
    <div class="terms">
        <div class="terms__wrap">
            <div class="terms__title">
                物件詳細
            </div>
            <v-divider></v-divider>
            <div class="terms__content pt-2">
                <div class="re-card">
                    <div class="re-card__thumb">
                        <v-img src="/images/samplees.jpg"></v-img>
                    </div>
                    <div class="re-card__detail-wrap">
                        <div class="re-card__pets">
                            ペット：猫・犬
                        </div>
                        <div class="re-card__name">
                            サンプル不動産
                        </div>
                        <div class="re-card__cost">
                            家賃：10万円
                        </div>
                        <div class="re-card__plan">
                            1LDK / 30㎡ / サンプル駅
                        </div>
                    </div>
                </div>
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
