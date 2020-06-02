<template>
    <div class="equall-start__title-wrap">
        <span class="equall-start__title">
            {{ title }}
        </span>
    </div>
</template>
<style lang="sass">
    .equall-start
        &__title-wrap
            text-align: center
        &__title
            color: white
            padding-bottom: 0.3rem
            border-bottom: 1px solid white
            text-align: center
            font-size: 1.25rem
            letter-spacing: 0.2rem
</style>
<script>
    export default {
        props: ["title"],
    }
</script>
