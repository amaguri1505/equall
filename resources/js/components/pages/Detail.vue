<template>
    <div class="detail">
        <div class="detail__title">
            物件詳細
        </div>
        <v-divider></v-divider>
        <div class="detail__content pt-2">
            <detail-thumbnail></detail-thumbnail>
            <div class="detail__catch mt-5">
                日本の暮らし方を改革する
            </div>
            <div class="detail__balloon mt-5">
                <div class="detail__balloon-text">
                    この物件はいいよねー
                    <div class="detail__balloon-arrow"></div>
                </div>
                <div class="detail__balloon-avatar">
                    <v-img
                        class="detail__balloon-avatar-img"
                        src="/images/samplees.jpg"
                    ></v-img>
                </div>
            </div>
            <div class="detail__pet-info mt-5">
                <div class="detail__sub-title detail__sub-title--pet-info">
                    ペット情報
                </div>
                <div class="detail__sub-content detail__sub-content--pet-info">

                </div>
            </div>
            <div class="detail__property-info mt-5">
                <div class="detail__sub-title detail__sub-title--property-info">
                    建物情報
                </div>
                <div class="detail__sub-content detail__sub-content--property-info"></div>

            </div>
            <div class="detail__inquiry mt-5">
                <a class="detail__inquiry-btn" href="mailto:">
                    お問い合わせ
                </a>
            </div>
        </div>
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

    export default {
        components: {
            DetailThumbnail,
        }

    }
</script>
