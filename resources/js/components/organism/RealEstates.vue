<template>
    <div class="re">
        <span
            class="re__title"
            v-if="label"
        >
            {{ label }}
        </span>
        <div class="re__carousel">
            <div
                v-if="(!properties || properties.length < 1)"
                class="re__nothing"
            >
                <div
                    class="re__nothing-title"
                >
                    検索結果
                </div>
                <div
                    class="re__nothing-content"
                >
                    ０件
                </div>
            </div>
            <carousel
                data-index="0"
                data-name="props"
                navigation-enabled="true"
                v-if="(properties || properties.length > 0)"
            >
                <slide
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
                </slide>
            </carousel>
        </div>
    </div>
</template>
<script>
    import RealEstateCard from "../moducule/RealEstateCard";

    export default {
        components: {
            RealEstateCard,
        },
        props: [
            "label",
            "properties",
        ],
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .re
        text-align: center

        &__title
            padding-bottom: 8px
            font-weight: bold
            color: #333
            font-size: 1.5rem
            letter-spacing: 0.2rem
            border-bottom: 3px solid #76c3bf

        &__carousel
            a
                color: #333

                &:hover, &:visited, &:link, &:active
                    color: #333

        &__nothing-title
            color: #666
            margin-top: 20px
            font-size: 1rem
            text-align: center

        &__nothing-content
            color: #666
            margin-top: 10px
            font-size: 1rem
            text-align: center

        &__nothing-link
            color: #666
            margin-top: 30px
            font-size: 0.8rem
            text-align: center
</style>
