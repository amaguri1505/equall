<template>
    <div class="search-detail-train">
        <v-dialog
            v-model="dialog"
            hide-overlay
            max-width="500"
        >
            <template v-slot:activator="{ on }">
                <div class="search-detail-train__wrap">
                    <v-icon
                        color="white"
                        class="search-detail-train__icon"
                        v-on="on"
                    >mdi-train</v-icon>
                    <div class="search-detail-train__text">
                        路線・駅で探す
                    </div>
                    <div class="search-detail-train__chip-wrap">
                        <v-chip
                            v-if="s_train.chip"
                            dark
                            color="#f09299"
                            v-for="s_train in s_trains.slice(0,3)"
                            :key="s_train.name"
                            class="mt-1"
                        >
                            {{ s_train.name }}
                        </v-chip>
                        <v-chip
                            v-if="s_trains.length >= 4"
                            dark
                            color="#f09299"
                            class="mt-1"
                        >
                            その他{{ s_trains.length - 3 }}駅
                        </v-chip>
                    </div>
                </div>
            </template>

            <v-card
                class="pa-5"
            >
                <v-card-content>
                    <v-form>
                        <station-auto
                            ref="station_auto"
                        ></station-auto>
                    </v-form>
                </v-card-content>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="add_value"
                    >
                        駅を条件に追加
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
    import StationAuto from "../moducule/StationAuto";

    export default {
        components: {
            StationAuto,
        },
        data () {
            return {
                dialog: false,
                s_trains: [],
            }
        },
        methods: {
            add_value: function (event) {
                this.s_trains.push({
                    name: this.$refs.station_auto.station,
                    chip: true,
                });
                this.$store.dispatch('addSearchStations', this.s_trains);
                this.dialog = false;
            }
        }
    }
</script>
