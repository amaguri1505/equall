<template>
    <div class="re-card">
        <v-container fluid>
            <v-row>
                <v-col
                    cols="6"
                >
                    <div class="re-card__thumb">
                        <v-img
                            width="250"
                            height="200"
                            :src="image_url"
                            gradient="to top right, rgba(240,240,240,0.1), rgba(240,240,240,0.1)"
                        ></v-img>
                    </div>
                </v-col>
                <v-col
                    cols="6"
                >
                    <div class="re-card__detail-wrap">
                        <div class="re-card__pets">
                            {{ pet_type }}
                        </div>
                        <div class="re-card__name">
                            {{ name }}
                        </div>
                        <div class="recard__station">
                            {{ station }}
                        </div>
                        <div class="re-card__cost">
                            {{ costYen }}
                        </div>
                        <div class="re-card__plan">
                            {{ structure }} / {{ area }}㎡
                        </div>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<style lang="sass">
    .re-card
        &__pets, &__name, &__station, &__cost, &__plan
            text-align: left

        a
            color: #333

            &:hover, &:visited, &:link, &:active
                color: #333

        &__detail-wrap
            color: #333
            line-height: 1.5rem

</style>
<script>
    export default {
        computed: {
            costYen: function () {
               return this.cost.toLocaleString() + '円';
            }
        },
        props: [
            "pet_type",
            "name",
            "station",
            "cost",
            "structure",
            "area",
            "image_url",
        ],
    }
</script>
