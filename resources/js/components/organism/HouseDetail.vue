<template>
    <div class="house-detail">
        <detail-thumbnail
            :house_property_images="house_property_images"
        ></detail-thumbnail>
        <div class="house-detail__catch mt-5">
            日本の暮らし方を改革する
        </div>
        <div class="house-detail__balloon mt-5">
            <div class="detail__balloon-text">
                {{ this.house_property.hitokoto }}
                <div class="house-detail__balloon-arrow"></div>
            </div>
            <div class="house-detail__balloon-avatar">
                <v-img
                    class="house-detail__balloon-avatar-img"
                    src="/images/samplees.jpg"
                ></v-img>
            </div>
        </div>
        <div class="house-detail__pet-info mt-5">
            <div class="house-detail__sub-content house-detail__sub-content--pet-info">
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
                    unit="頭"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="最寄駅 徒歩（分）"
                    v-bind:subtitle="this.house_property.nearest_station"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="所在地"
                    v-bind:subtitle="this.house_property.address"
                ></detail-sub-content-item>
                <div class="house-detail__map">
                    <iframe
                        width="400"
                        height="320"
                        frameborder="0" style="border:0"
                        :src="'https://www.google.com/maps/embed/v1/search?key=' +
                        embed_map_api_key +
                        '&q=' +
                        house_property.address"
                        allowfullscreen
                    >
                    </iframe>
                </div>
            </div>
        </div>
        <div class="house-detail__property-info mt-5">
            <div class="house-detail__sub-content house-detail__sub-content--property-info">
                <detail-sub-content-item
                    title="ペット飼育"
                    v-bind:subtitle="this.house_property.is_pet"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="賃料"
                    v-bind:subtitle="this.house_property.cost"
                    unit="円"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="管理費"
                    v-bind:subtitle="this.house_property.manage_cost"
                    unit="円"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="管理費"
                    v-bind:subtitle="this.house_property.manage_cost"
                    unit="円"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="管理費"
                    v-bind:subtitle="this.house_property.manage_cost"
                    unit="円"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="専有面積"
                    v-bind:subtitle="this.house_property.area"
                    unit="㎡"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="間取り"
                    v-bind:subtitle="this.house_property.floor_plan"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="階数"
                    v-bind:subtitle="this.house_property.floor"
                    unit="階"
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
                    title="掲載日"
                    v-bind:subtitle="this.house_property.start_date"
                ></detail-sub-content-item>
                <detail-sub-content-item
                    title="物件ID"
                    v-bind:subtitle="this.house_property.id"
                ></detail-sub-content-item>
            </div>
        </div>
        <div class="house-detail__inquiry mt-5">
            <v-btn
                class="house-detail__inquiry-btn"
                :to="this.contact_url"
                color="#f09299"
                large
                dark
            >
                お問い合わせ
            </v-btn>
        </div>
        <div class="house-detail__agent-info mt-5">
            <v-card>
                <v-card-title>
                    取扱不動産会社
                </v-card-title>
                <v-card-text>
                    <div class="house-detail__agent-sub">不動産会社名：{{ estate_agent.name }}</div>
                    <div class="house-detail__agent-sub">所在地：{{ estate_agent.address }}</div>
                    <div class="house-detail__agent-sub">事務所電話番号：{{ estate_agent.name }}
                        （equallからのお問い合わせ時は、上記のお問い合わせボタンからご連絡ください）
                    </div>
                    <div class="house-detail__agent-sub">免許証番号：{{ estate_agent.name }}</div>
                </v-card-text>
            </v-card>
        </div>
    </div>
</template>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .house-detail

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

        &__map
            padding: 16px 16px 8px 16px

</style>
<script>
    import DetailThumbnail from "../moducule/DetailThumbnail";
    import DetailSubContentItem from "../moducule/DetailSubContentItem";

    export default {
        components: {
            DetailThumbnail,
            DetailSubContentItem,
        },
        props: ['house_property', 'house_property_images', ],
        data() {
            return {
                estate_agent: [],
                contact_url: "",
                embed_map_api_key: "AIzaSyDogWEJf-SbI38v5XOqtMoyyd2FQD4tYO4",
            }
        },
    }
</script>
