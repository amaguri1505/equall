<template>
    <div>
        <equall-header class="index__header" />
        <div class="index__wrap">
            <equall-logo class="index__logo" />
            <search-form />
            <equall-search-detail />
            <equall-family class="index__family"/>
        </div>
        <equall-footer class="index__footer" />
    </div>
</template>

<script>
    import EquallHeader from "../includes/Header";
    import EquallFooter from "../includes/Footer";
    import EquallLogo from "../atom/EquallLogo";
    import EquallFamily from "../atom/EquallFamily";
    import SearchForm from "../moducule/SearchForm";
    import EquallSearchDetail from "../atom/EquallSearchDetail";


    export default {
        components: {
            EquallHeader,
            EquallFooter,
            EquallLogo,
            EquallFamily,
            SearchForm,
            EquallSearchDetail,
        }
    };
</script>

<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .index
        &__header
            position: fixed
            top: 0
            width: 100%
            max-width: 540px //Todo PC版できたら外す
            z-index: 100
        &__wrap
            height: calc(100vh - 48px) //ヘッダーが50px固定なので
            margin-top: 48px
            padding-top: 40px
            background-color: colors(primary)
            position: relative
        &__family
            position: absolute
            margin: 0
            bottom: 0
            left: 0
            right: 0
</style>
