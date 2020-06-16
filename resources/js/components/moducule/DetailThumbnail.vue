<template>
    <div class="detail-thumbnail">
        <div class="detail-thumbnail__slider-wrap">
            <v-carousel
                hide-delimiters
                height="auto"
            >
                <v-carousel-item>
                    <v-img src="/images/samplees.jpg"></v-img>
                </v-carousel-item>
                <v-carousel-item>
                    <v-img src="/images/samplees.jpg"></v-img>
                </v-carousel-item>
                <v-carousel-item>
                    <v-img src="/images/samplees.jpg"></v-img>
                </v-carousel-item>
                <v-carousel-item>
                    <v-img src="/images/samplees.jpg"></v-img>
                </v-carousel-item>
                <v-carousel-item>
                    <v-img src="/images/samplees.jpg"></v-img>
                </v-carousel-item>
                <v-carousel-item>
                    <v-img src="/images/samplees.jpg"></v-img>
                </v-carousel-item>
            </v-carousel>
        </div>
    </div>
</template>
<script>
    export default {
        components: {},
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .detail-thumbnail
        &__carousel
            a
                color: #333

                &:hover, &:visited, &:link, &:active
                    color: #333

</style>

