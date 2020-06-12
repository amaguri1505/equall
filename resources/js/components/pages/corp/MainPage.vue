<template>
    <div>
        <the-header class="corp-layout__header"/>
        <router-view/>
    </div>
</template>
<script>
    import TheHeader from '../../includes/corp/Header';

    export default {
        name: 'appcorp',
        components: {
            TheHeader,
        },
    }
</script>
<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .corp-layout
        &__header
            width: 100%
            z-index: 100
</style>
