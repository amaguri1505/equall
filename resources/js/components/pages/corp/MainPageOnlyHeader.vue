<template>
    <div>
        <router-view/>
    </div>
</template>
<script>

    export default {
        name: 'appcorp',
    }
</script>
<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .corp-layout
        &__header
            width: 100%
            z-index: 100
</style>
