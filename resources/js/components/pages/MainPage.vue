<template>
    <div>
        <v-snackbar
            top
            v-model="snackbar"
            :color="snack_color"
        >
            {{ snack_text }}
        </v-snackbar>
        <v-overlay
            :value="overlay"
            z-index="9999"
            color="white"
            opacity="1.0"
        >
            <v-img
                src="/images/overlay_pict.png"
                height="256"
                width="256"
            ></v-img>
        </v-overlay>
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
            TheFooter,
        },
        data ()  {
            return {
                snackbar: false,
                overlay: false,
                snack_color: "black",
                snack_text: "",
            }
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
