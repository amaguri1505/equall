<template>
    <div>
        <div class="index__wrap index__wrap--headline">
            <equall-logo class="index__logo" />
            <search-form />
            <equall-search-detail />
            <equall-family class="index__family"/>
        </div>
        <div class="index__wrap">
            <real-estates class="mt-5 mb-5" label="最新物件"></real-estates>
            <v-divider></v-divider>
            <real-estates class="mt-5 mb-5" label="猫ちゃんと暮らせるおうち"></real-estates>
            <v-divider></v-divider>
            <real-estates class="mt-5 mb-5" label="わんちゃんと暮らせるおうち"></real-estates>
            <v-divider></v-divider>
        </div>
    </div>
</template>

<script>
    import EquallHeader from "../includes/Header";
    import EquallFooter from "../includes/Footer";
    import EquallLogo from "../atom/EquallLogo";
    import EquallFamily from "../atom/EquallFamily";
    import SearchForm from "../moducule/SearchForm";
    import EquallSearchDetail from "../atom/EquallSearchDetail";
    import RealEstates from "../organism/RealEstates";


    export default {
        components: {
            EquallHeader,
            EquallFooter,
            EquallLogo,
            EquallFamily,
            SearchForm,
            EquallSearchDetail,
            RealEstates,
        }
    };
</script>

<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .index
        &__wrap
            padding: 40px 20px 0 20px
            &--headline
                position: relative
                height: calc(100vh - 48px) //ヘッダーが50px固定なので
                margin-top: 48px
                background-color: colors(primary)
        &__family
            position: absolute
            margin: 0
            bottom: 0
            left: 0
            right: 0
</style>
