<template>
    <div class="header__wrap">
        <v-app-bar
            color="white"
            flat
        >
            <router-link to="/corp/" tag="img" src="/images/logo.png" class="header__logo"></router-link>
            <v-spacer></v-spacer>
            <v-btn
                @click="logout"
                class="mr-5"
            >ログアウト</v-btn>
            <inquiry-count
                :total_inquiry="total_inquiry"
            ></inquiry-count>
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
    import InquiryCount from '../../moducule/corp/InquiryCount';
    import { mapActions } from 'vuex';

    export default {
        components: {
            InquiryCount,
        },
        computed: {
            ...mapGetters([
                'isLogged',
            ])
        },
        methods: {
            ...mapActions({
                signOut: 'auth_corp/signOut',
            }),

            logout() {
                this.signOut();
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

        props: [
            'total_inquiry',
        ],
    }
</script>
