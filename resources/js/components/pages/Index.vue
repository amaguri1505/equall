<template>
    <div class="index__wrap">
        <search-form/>
        <real-estates
            class="mt-5 mb-5"
            label="最新物件"
            :properties="latest_properties"
        ></real-estates>
        <v-divider></v-divider>
        <real-estates
            class="mt-5 mb-5"
            label="猫ちゃんと暮らせるおうち"
            :properties="cats_properties"
        ></real-estates>
        <v-divider></v-divider>
        <real-estates
            class="mt-5 mb-5"
            label="わんちゃんと暮らせるおうち"
            :properties="dogs_properties"
        ></real-estates>
        <v-divider></v-divider>
    </div>
</template>

<script>
    import EquallHeader from "../includes/Header";
    import EquallFooter from "../includes/Footer";
    import EquallSidebar from "../includes/Sidebar";
    import EquallLogo from "../atom/EquallLogo";
    import EquallFamily from "../atom/EquallFamily";
    import SearchForm from "../moducule/SearchForm";
    import TopSearchDetail from "../moducule/TopSearchDetail";
    import RealEstates from "../organism/RealEstates";


    export default {
        data() {
            return {
                request_cnt: 0,
                latest_properties: [],
                cats_properties: [],
                dogs_properties: [],
            }
        },
        components: {
            EquallHeader,
            EquallFooter,
            EquallSidebar,
            EquallLogo,
            EquallFamily,
            SearchForm,
            TopSearchDetail,
            RealEstates,
        },
        created() {
            this.$store.dispatch('modifyOverlayWhite', true);
            this.$http
                .post('/api/get-latest-properties', {})
                .then(response => {
                    this.latest_properties = response.data;
                    this.request_cnt++;
                    if (this.request_cnt >= 3) {
                        this.$store.dispatch('modifyOverlayWhite', false);
                    }
                })
                .catch(error => {
                    this.$store.dispatch('modifySnackText', '読み込みに失敗しました。リロードしてください。');
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                });


            this.$http
                .post('/api/get-latest-properties', {
                    pet_types: 'cat',
                })
                .then(response => {
                    this.cats_properties = response.data;
                    this.request_cnt++;
                    if (this.request_cnt >= 3) {
                        this.$store.dispatch('modifyOverlayWhite', false);
                    }
                })
                .catch(error => {
                    this.$store.dispatch('modifySnackText', '読み込みに失敗しました。リロードしてください。');
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                });

            this.$http
                .post('/api/get-latest-properties', {
                    pet_types: 'dog',
                })
                .then(response => {
                    this.dogs_properties = response.data;
                    this.request_cnt++;
                    if (this.request_cnt >= 3) {
                        this.$store.dispatch('modifyOverlayWhite', false);
                    }
                })
                .catch(error => {
                    this.$store.dispatch('modifySnackText', '読み込みに失敗しました。リロードしてください。');
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                });

        },
    };
</script>

<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .index
        @media(max-width: 320px)
            font-size: 0.8rem

        &__wrap
            &--headline
                background-color: colors(primary)

        &__family
            position: absolute
            margin: 0
            bottom: 0
            left: 0
            right: 0

        &__copy
            margin-top: 20px
            text-align: center
            color: white
            font-size: 1.25rem
            font-weight: bold

            @media(max-width: 600px)
                font-size: 1.0rem

            @media(max-width: 320px)
                font-size: 0.8rem

        &__for-beginner
            margin-top: 20px
            text-align: center

</style>
