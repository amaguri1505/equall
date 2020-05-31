<template>
    <div>
        <div class="register__wrap">
            <equall-logo class="register__logo"/>
            <equall-start class="mt-5" />
            <equall-line-login class="mt-5"/>
            <equall-terms class="mt-5"/>
            <equall-family class="mt-5 register__family"/>
        </div>
    </div>
</template>
<script>
    import EquallLogo from "../atom/EquallLogo";
    import EquallFamily from "../atom/EquallFamily";
    import EquallStart from "../atom/EquallStart";
    import EquallTerms from "../atom/EquallTerms";
    import EquallLineLogin from "../atom/EquallLineLogin";


    export default {
        components: {
            EquallLogo,
            EquallFamily,
            EquallStart,
            EquallTerms,
            EquallLineLogin,
        }
    };
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .register
        &__wrap
            height: calc(100vh - 48px)
            //ヘッダーが50px固定なので
            margin-top: 48px
            padding: 40px 20px 0 20px
            background-color: colors(primary)
            position: relative
        &__family
            position: absolute
            margin: 0
            bottom: 0
            left: 0
            right: 0
</style>
