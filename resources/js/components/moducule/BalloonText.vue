<template>
    <div class="balloon-text">
        <div class="balloon-text__text">
            {{ this.text }}
            <div class="balloon-text__arrow"></div>
        </div>
        <div class="balloon-text__avatar-wrap">
            <v-img
                class="balloon-text__avatar"
                :src="img"
            ></v-img>
        </div>
    </div>
</template>
<style lang="sass">
    .balloon-text
        display: flex

        &__text
            margin-right: 20px
            position: relative
            width: 100%
            border-radius: 5px
            padding: 1.5rem 1.5rem
            border: 1px solid #ccc
            text-align: center
            font-weight: bold

        &__arrow
            position: absolute
            top: 25px
            left: auto
            right: -18px
            border-top: 7px solid transparent
            border-right: 7px solid transparent
            border-bottom: 7px solid transparent
            border-left: 10px solid #ccc

        &__avatar-wrap
            display: flex

        &__avatar
            width: 64px
            height: 64px
            border-radius: 50%

</style>
<script>
    export default {
        props: [
            'text',
            'img',
        ],
    }
</script>
