<template>
    <div class="search-detail-train">
        <v-dialog
            v-model="dialog"
            hide-overlay
            max-width="500"
        >
            <template v-slot:activator="{ on }">
                <v-icon
                    color="white"
                    class="search-detail-train__icon"
                    v-on="on"
                >
                    mdi-map-search
                </v-icon>
                <div class="search-detail-train__text">
                    エリアで探す
                </div>
            </template>

            <v-card
                class="pa-5"
            >
                <v-card-content>
                    <v-form>
                        <v-checkbox
                            v-model="selected_ward"
                            label="ward.name"
                            value="ward.name"
                        ></v-checkbox>
                    </v-form>
                </v-card-content>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="search"
                    >
                        エリアを条件に追加
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<style lang="sass">
    .search-detail-area
        text-align: center

        &__icon
            font-size: 80px !important

        &__text
            color: white

</style>
<script>
    export default {
        data() {
            return {
                dialog: false,
            }
        },
        methods: {
            search: function (event) {
                this.$router.push("/result");
            }
        }
    }
</script>
