<template>
    <div class="re">
        <v-overlay
            :value="overlay"
        >
            <v-progress-circular
                indeterminate
                color="#76c3bf"
            ></v-progress-circular>
        </v-overlay>
        <div class="re__title">
            <v-icon></v-icon>
            {{ label }}
        </div>
        <div class="re__carousel">
            <v-carousel
                hide-delimiters
                height="auto"
            >
                <v-carousel-item
                    v-for="property in properties"
                    :key="property.id"
                    :to="'/detail/' + property.id"
                >
                    <real-estate-card
                        :pet_type="property.pet_type"
                        :name="property.name"
                        :station="property.station"
                        :cost="property.cost"
                        :structure="property.structure"
                        :area="property.area"
                    ></real-estate-card>
                </v-carousel-item>
            </v-carousel>
        </div>
    </div>
</template>
<script>
    import RealEstateCard from "../moducule/RealEstateCard";

    export default {
        data() {
            return {
                properties: [],
                overlay: true,
            }
        },
        components: {
            RealEstateCard,
        },
        props: [
            "label"
        ],
        created () {
            this.$http
                .get('/get-properties')
                .then(response => {
                    this.properties = response.data;
                    this.overlay = false;
                });
        }
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

        &__carousel
            a
                color: #333

                &:hover, &:visited, &:link, &:active
                    color: #333

</style>
