<template>
    <div class="re">
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
                        :image_url="'/uploads/' + property.id + '/1.jpg'"
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
                propertyImages: [],
            }
        },
        components: {
            RealEstateCard,
        },
        props: [
            "label",
            "s_search_word",
            "s_stations",
            "s_areas",
            "s_costs",
            "s_pets",
        ],
        created() {
            this.$parent.$parent.overlay = true;
            this.$http
                .post('/api/search-properties', {
                    s_search_word: this.s_search_word,
                    s_stations: this.s_stations,
                    s_areas: this.s_areas,
                    s_costs: this.s_costs,
                    s_pets: this.s_pets,
                })
                .then(response => {
                    this.properties = response.data;
                    this.$parent.$parent.overlay = false;
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
