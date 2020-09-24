<template>
    <div class="detail-sub-content-item">
        <div class="detail-sub-content-item__group">
            <div class="detail-sub-content-item__title">
                {{ title }}
            </div>
            <div class="detail-sub-content-item__subtitle">
                {{ subtitle }}
                {{ unit }}
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
            font-size: 1.0rem
            line-height: 1.2
            margin-bottom: 4px

        &__subtitle
            font-size: 1.0rem

</style>
<script>
    export default {
        props: {
            title: {
                type: String,
            },
            subtitle: {
                type: String,
                default: "-",
            },
            unit: {
                type: String,
            },
        },
    }

</script>
