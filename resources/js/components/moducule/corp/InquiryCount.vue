<template>
    <div class="inquiry-count">
        <v-card>
            <v-card-title
                class="text-center inquiry-count__title"
            >
                今月の問い合わせ数
            </v-card-title>
            <v-content
                class="text-center inquiry-count__content"
            >
                件
            </v-content>
        </v-card>
    </div>
</template>

<script>
    export default {
        props: {},
    };
</script>

<style lang="sass">
    .inquiry-count

        &__title
            padding: 0 1rem
            font-size: 0.75rem
            color: #999

        &__content
            padding: 0 1rem
            font-size: 0.75rem
            color: #999
            border-top: 1px solid #ccc
</style>
