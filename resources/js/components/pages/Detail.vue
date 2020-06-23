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
                    <detail-sub-content-item
                        title="種類"
                        v-bind:subtitle="this.house_property.type"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="物件名"
                        v-bind:subtitle="this.house_property.name"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="Goodポイント"
                        v-bind:subtitle="this.house_property.good"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="Badポイント"
                        v-bind:subtitle="this.house_property.bad"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="ペットの種類"
                        v-bind:subtitle="this.house_property.pet_type"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="ペット数"
                        v-bind:subtitle="this.house_property.pet_cnt"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="最寄駅"
                        v-bind:subtitle="this.house_property.nearest_station"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="所在地"
                        v-bind:subtitle="this.house_property.address"
                    ></detail-sub-content-item>
                    <div class="detail__map">
                        <iframe src="https://www.google.com/maps/d/embed?mid=1AJeFEUctVjLyANcnoHSS0-ZWAx0&hl=ja"
                                width="400" height="320"></iframe>
                    </div>
                </div>
            </div>
            <div class="detail__property-info mt-5">
                <div class="detail__sub-title detail__sub-title--property-info">
                    建物情報
                </div>
                <div class="detail__sub-content detail__sub-content--property-info">
                    <detail-sub-content-item
                        title="ペット飼育"
                        v-bind:subtitle="this.house_property.is_pet"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="賃料"
                        v-bind:subtitle="this.house_property.cost"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="管理費"
                        v-bind:subtitle="this.house_property.manage_cost"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="初期費用"
                        v-bind:subtitle="this.house_property.initial_cost"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="専有面積"
                        v-bind:subtitle="this.house_property.area"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="間取り"
                        v-bind:subtitle="this.house_property.floor_plan"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="階数"
                        v-bind:subtitle="this.house_property.floor"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="築年月"
                        v-bind:subtitle="this.house_property.age"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="建物構造"
                        v-bind:subtitle="this.house_property.structure"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="駐車場・バイク・駐輪場"
                        v-bind:subtitle="this.house_property.park"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="設備"
                        v-bind:subtitle="this.house_property.facility"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="掲載費"
                        v-bind:subtitle="this.house_property.start_date"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="物件ID"
                        v-bind:subtitle="this.house_property.id"
                    ></detail-sub-content-item>
                    <detail-sub-content-item
                        title="取扱不動産会社"
                        v-bind:subtitle="this.house_property.corp"
                    ></detail-sub-content-item>
                </div>
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

    export default {
        components: {
            DetailThumbnail,
            DetailSubContentItem,
        },
        created () {
            const detail_id = this.$route.params.detail_id;
            this.$http
                .get(`/get-detail/${detail_id}`)
                .then(response => {
                    this.house_property = response.data;
                });
        },
        data () {
            return {
                house_property: {},
                // type: "賃貸",
                // name: "サンプル物件",
                // good: "良い点",
                // bad: "悪い点",
                // pet_type: "猫",
                // pet_cnt: "1",
                // nearest_station: "サンプル駅",
                // address: "東京都目黒区上目黒",
                // is_pet: "飼育可能",
                // cost: "100,000円",
                // manage_cost: "10,000円",
                // initial_cost: "敷金0ヶ月 / 礼金0ヶ月 / 保証金0ヶ月",
                // area: "41.77㎡",
                // floor_plan: "1LDK",
                // floor: "3階建",
                // age: "1990年12月",
                // structure: "鉄骨鉄筋コンクリート",
                // park: "有り *お問い合わせ",
                // facility: "鍵交換必須",
                // start_date: "2020/06/25",
                // id: "1",
                // corp: "株式会社marumaru店",
            }
        }
    }
</script>
