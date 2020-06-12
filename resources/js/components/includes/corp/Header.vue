<template>
    <div class="header__wrap">
        <v-app-bar
            color="white"
            flat
        >
            <router-link to="/corp/" tag="img" src="/images/logo.png" class="header__logo"></router-link>
            <v-spacer></v-spacer>
            <inquery-count></inquery-count>
        </v-app-bar>
    </div>
</template>
<style lang="sass">
    .header
        &__logo
            height: 30px
            object-fit: contain
            cursor: pointer

        &__wrap
            header
                margin: auto
</style>
<script>
    import {mapGetters} from 'vuex';
    import InqueryCount from '../../moducule/corp/InqueryCount';

    export default {
        components: {
            InqueryCount,
        },
        computed: {
            ...mapGetters([
                'isLogged',
            ])
        },
        methods: {
            logout() {
                this.$store.dispatch('logout');
            }
        },
        data: () => ({
            drawer: false,
            group: null,
        }),

        watch: {
            group() {
                this.drawer = false
            },
        },
    }
</script>
