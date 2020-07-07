<template>
    <div class="corp-layout">
        <v-snackbar
            top
            v-model="snackbar"
            :color="snack_color"
        >
            {{ snack_text }}
        </v-snackbar>
        <v-overlay
            :value="overlay"
        >
            <v-progress-circular
                indeterminate
                color="#76c3bf"
            ></v-progress-circular>
        </v-overlay>
        <the-header
            :total_inquiry="total_inquiry"
            class="corp-layout__header"
        />
        <v-divider></v-divider>
        <v-container
            class="pa-0"
            fluid
        >
            <v-row
                class="ma-0"
            >
                <v-col
                    cols="2"
                    class="pa-0 corp-layout__flex corp-layout__sidebar-wrap"
                >
                    <the-sidebar />
                </v-col>
                <v-col
                    cols="10"
                    offset="0"
                    class="pa-0 corp-layout__flex corp-layout__wrap"
                >
                    <router-view />
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
    import TheHeader from '../../includes/corp/Header';
    import TheSidebar from '../../includes/corp/SideBar';

    export default {
        name: 'appcorp',
        components: {
            TheSidebar,
            TheHeader,
        },
        data () {
            return {
                snackbar: false,
                overlay: false,
                snack_color: "success",
                snack_text: "test",
                total_inquiry: 0,
            }
        },
        created () {
            this.$http
                .get('/get-total-inquiry/0')
                .then(response => {
                    this.total_inquiry = response.data;
                    this.$parent.overlay = false;
                });
        },
    }
</script>
<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .corp-layout
        height: 100vh
        background-color: rgba(118, 195, 191, 0.2)
        overflow: scroll

        &__header
            width: 100%
            z-index: 100

        &__sidebar-wrap
            border-right: 1px solid #333

        &__wrap
            overflow: scroll

        &__flex
            height: calc(100vh - 56px)

</style>
