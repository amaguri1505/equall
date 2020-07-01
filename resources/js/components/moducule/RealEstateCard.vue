<template>
    <div class="re-card">
        <v-container fluid>
            <v-row>
                <v-col
                    cols="6"
                >
                    <div class="re-card__thumb">
                        <v-img src="/images/samplees.jpg"></v-img>
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
                            {{ cost }}
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
        a
            color: #333

            &:hover, &:visited, &:link, &:active
                color: #333

        &__detail-wrap
            line-height: 1.5rem

</style>
<script>
    export default {
        props: [
            "pet_type",
            "name",
            "station",
            "cost",
            "structure",
            "area",
        ],
    }
</script>
