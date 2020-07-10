<template>
    <div class="mypage-edit">
        <equall-logo class="mypage-edit__logo" />
        <equall-start
            title="あなたの性別を教えてください"
            class="mt-5"
        />
    </div>
</template>
<script>
    import EquallLogo from "../atom/EquallLogo";
    import EquallStart from "../atom/EquallStart";

    export default {
        components: {
            EquallLogo,
            EquallStart,
        },

    }

</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"

    .mypage-edit
        margin-top: 48px
        padding: 40px 20px 80px 20px
        background-color: colors(primary)

</style>
