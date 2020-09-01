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
            :value="overlay_white"
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
        <v-overlay
            :value="overlay"
            z-index="9999"
        >
            <v-progress-circular
                indeterminate
                color="#76c3bf"
            ></v-progress-circular>
        </v-overlay>
        <the-header class="layout__header"/>
        <router-view/>
        <the-footer class="layout__footer"/>
    </div>
</template>
<script>
    import TheHeader from '../includes/Header';
    import TheFooter from '../includes/Footer';
    import {mapActions} from 'vuex';
    import {mapState} from 'vuex';

    export default {
        name: 'app',
        components: {
            TheHeader,
            TheFooter,
        },
        data() {
            return {}
        },
        computed: {
            ...mapState(['overlay_white', 'overlay', 'snack_color', 'snack_text']),
            snackbar: {
                get() {
                    return this.$store.state.snackbar;
                },
                set(value) {
                    this.$store.dispatch('modifySnackbar', value);
                }
            }
        },
        methods: {
            ...mapActions({
                me: 'auth/me',
            }),
        },
        created() {
            this.$store.dispatch('auth/me');
        },
    }
</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .layout
        &__header
            width: 100%

            //Todo PC版できたら外す
            max-width: 540px

            z-index: 100
</style>
