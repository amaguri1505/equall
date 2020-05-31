<template>
    <div class="re">
        <div class="re__title">
            {{ label }}
        </div>
        <div class="re__carousel">
            <v-carousel>
                <v-carousel-item>
                    <real-estate-card></real-estate-card>
                </v-carousel-item>
                <v-carousel-item>
                    <real-estate-card></real-estate-card>
                </v-carousel-item>
                <v-carousel-item>
                    <real-estate-card></real-estate-card>
                </v-carousel-item>
                <v-carousel-item>
                    <real-estate-card></real-estate-card>
                </v-carousel-item>
                <v-carousel-item>
                    <real-estate-card></real-estate-card>
                </v-carousel-item>
            </v-carousel>
        </div>
    </div>
</template>
<script>
    import RealEstateCard from "../moducule/RealEstateCard";

    export default {
        components: {
            RealEstateCard,
        },
        props: ["label"],
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .re
        &__title
            text-align: center
            color: colors(primary)
            font-size: 1.25rem
            letter-spacing: 0.2rem

</style>
