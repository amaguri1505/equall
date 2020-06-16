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
                >mdi-train</v-icon>
                <div class="search-detail-train__text">
                    路線・駅で探す
                </div>
            </template>

            <v-card>
                <v-card-content>
                    路線絞り込み
                </v-card-content>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="search"
                    >
                        検索
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<style lang="sass">
    .search-detail-train
        text-align: center

        &__icon
            font-size: 80px !important

        &__text
            color: white

</style>
<script>
    export default {
        data () {
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
