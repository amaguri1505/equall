<template>
    <div>
        <the-header class="layout__header"/>
        <router-view/>
        <the-footer class="layout__footer"/>
    </div>
</template>
<script>
    import TheHeader from '../includes/Header';
    import TheFooter from '../includes/Footer';

    export default {
        name: 'app',
        components: {
            TheHeader,
            TheFooter
        },
    }
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .layout
        &__header
            width: 100%
            max-width: 540px //Todo PC版できたら外す
            z-index: 100
</style>
