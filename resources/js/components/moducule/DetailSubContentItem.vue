<template>
    <div class="detail-sub-content-item">
        <div class="detail-sub-content-item__group">
            <div class="detail-sub-content-item__title">
                {{ title }}
            </div>
            <div class="detail-sub-content-item__subtitle">
                {{ subtitle }}
            </div>
        </div>
        <v-divider></v-divider>
    </div>
</template>

<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .detail-sub-content-item

        &__group
            padding: 16px 16px 8px 16px

        &__title
            font-size: 1.2rem
            line-height: 1.2
            margin-bottom: 4px

        &__subtitle

</style>
<script>
    export default {
        props: ['title', 'subtitle'],
    }

</script>
