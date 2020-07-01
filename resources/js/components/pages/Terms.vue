<template>
    <div class="terms">
        <div class="terms__wrap">
            <div class="terms__title">
                <v-icon color="#76c3bf">mdi-alert-circle</v-icon>
                利用規約
            </div>
            <v-divider></v-divider>
            <div class="terms__content pt-2">
                <terms></terms>
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
    import Terms from "../organism/Terms";

    export default {
        components: {
            Terms,
        },
    }
</script>
