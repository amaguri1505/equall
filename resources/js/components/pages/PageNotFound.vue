<template>
    <div class="notfound">
        <div class="notfound__wrap">
            <div class="notfound__title">
                <v-icon color="#76c3bf">mdi-alert-circle</v-icon>
                ページが見つかりませんでした
            </div>
            <v-spacer></v-spacer>
            <div class="notfound__link text-center mt-5 mb-5 pa-5">
                <router-link to="/">
                    トップへ
                </router-link>
            </div>
        </div>
    </div>
</template>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .notfound
        &__wrap
            margin-top: 48px
            padding: 40px 20px 80px 20px

        &__title
            color: colors(primary)
            text-align: center
            letter-spacing: 0.2rem
            font-size: 1.5rem

        &__link
            a
                color: colors(primary)

                &:active,
                &:visited,
                &:hover,
                &:link
                    color: colors(primary)
</style>
