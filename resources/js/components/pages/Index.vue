<template>
    <div>
        <div class="index__wrap index__wrap--headline">
            <equall-logo class="index__logo"/>
            <search-form/>
            <top-search-detail/>
            <equall-family class="index__family"/>
        </div>
        <div class="index__wrap">
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
    </div>
</template>

<script>
    import EquallHeader from "../includes/Header";
    import EquallFooter from "../includes/Footer";
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
        &__wrap
            padding: 40px 20px 0 20px

            &--headline
                position: relative
                height: calc(100vh - 48px)
                margin-top: 48px
                background-color: colors(primary)

        &__family
            position: absolute
            margin: 0
            bottom: 0
            left: 0
            right: 0
</style>
