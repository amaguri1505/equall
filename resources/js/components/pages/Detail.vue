<template>
    <div class="detail">
        <div class="detail__title">
            物件詳細
        </div>
        <v-divider></v-divider>
        <house-detail
            class="mt-2"
            :house_property="house_property"
            :house_property_images="house_property_images"
        ></house-detail>
    </div>
</template>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .detail
        margin-top: 48px
        padding: 40px 20px 80px 20px

        &__title
            color: colors(primary)
            text-align: center
            letter-spacing: 0.2rem
            font-size: 1.5rem

        &__sub-title
            color: colors(primary)
            font-weight: bold
            font-size: 1.25rem

        &__sub-content-group
            padding: 16px 16px 8px 16px

        &__sub-content-title
            font-size: 1.2rem
            line-height: 1.2
            margin-bottom: 2px

        &__catch
            background-color: colors(primary)
            color: white
            font-size: 18px
            text-align: center
            padding: 1rem 0

        &__balloon
            display: flex

        &__balloon-text
            margin-right: 20px
            position: relative
            width: 100%
            border-radius: 5px
            padding: 1.5rem 1.5rem
            border: 1px solid #ccc

        &__balloon-arrow
            position: absolute
            top: 25px
            left: auto
            right: -18px
            border-top: 7px solid transparent
            border-right: 7px solid transparent
            border-bottom: 7px solid transparent
            border-left: 10px solid #ccc

        &__balloon-avatar
            display: flex

        &__balloon-avatar-img
            width: 64px
            height: 64px
            border-radius: 50%

        &__inquiry
            text-align: center

        &__inquiry-btn
            background-color: #f09299
            color: white
            padding: 1rem 2rem
            border-radius: 2rem
            text-decoration: none

            &:visited, &:link, &:active, &:hover
                color: white

</style>

<script>
    import DetailThumbnail from "../moducule/DetailThumbnail";
    import DetailSubContentItem from "../moducule/DetailSubContentItem";
    import HouseDetail from "../organism/HouseDetail";

    export default {
        components: {
            DetailThumbnail,
            DetailSubContentItem,
            HouseDetail,
        },
        created() {
            this.$store.dispatch('modifyOverlayWhite', true);
            const detail_id = this.$route.params.detail_id;
            this.contact_url = "/detail/" + detail_id + "/contact";
            this.$http
                .get(`/api/get-detail/${detail_id}`)
                .then(response => {
                    this.house_property = response.data;
                    this.$http
                        .get(`/api/get-property-image/${detail_id}`)
                        .then(response => {
                            this.house_property_images = response.data;
                            this.$store.dispatch('modifyOverlayWhite', false);
                        });
                });
        },
        data() {
            return {
                house_property: {},
                house_property_images: [],
                estate_agent: [],
                contact_url: "",
            }
        },
    }
</script>
