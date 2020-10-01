<template>
    <div class="search-detail-cost">
        <v-dialog
            v-model="dialog"
            hide-overlay
            max-width="500"
            scrollable
        >
            <template v-slot:activator="{ on }">
                <div class="search-detail-cost__wrap">
                    <v-icon
                        color="white"
                        class="search-detail-train__icon"
                        v-on="on"
                    >
                        mdi-currency-jpy
                    </v-icon>
                    <div class="search-detail-train__text">
                        価格で探す
                    </div>
                    <v-chip
                        v-if="s_costs.under || s_costs.limit"
                        dark
                        color="#f09299"
                        class="mt-1"
                    >
                        {{ s_costs.under || "" }}
                        〜
                        {{ s_costs.limit || "" }}
                    </v-chip>
                </div>
            </template>

            <v-card
                class="pa-5"
            >
                <v-card-title
                    class="text-right pa-0"
                >
                    <v-spacer></v-spacer>
                    <v-btn icon @click="dialog=false">
                        <v-icon>
                            mdi-close
                        </v-icon>
                    </v-btn>
                </v-card-title>
                <v-card-text>
                    <v-form>
                        <v-select
                            v-model="s_costs.under"
                            :items="under_cost"
                            label="家賃下限"
                            required
                        ></v-select>
                        <div>
                            〜
                        </div>
                        <v-select
                            v-model="s_costs.limit"
                            :items="limit_cost"
                            label="家賃上限"
                            required
                        ></v-select>
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="#666"
                        text
                        @click="reset_cost"
                    >
                        リセット
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="#666"
                        text
                        @click="add_cost"
                    >
                        決定
                    </v-btn>
                    <v-spacer></v-spacer>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<style lang="sass">
    .search-detail-cost
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
                cost: [],
                s_costs: {
                    get() {
                        return this.$store.state.s_costs;
                    },
                    set(value) {
                        this.$store.dispatch('addSearchCosts', value);
                    },
                },
                under_cost: [
                    "下限なし",
                    "3万円",
                    "3.5万円",
                    "4万円",
                    "4.5万円",
                    "5万円",
                    "5.5万円",
                    "6万円",
                    "6.5万円",
                    "7万円",
                    "7.5万円",
                    "8万円",
                    "8.5万円",
                    "9万円",
                    "9.5万円",
                    "10万円",
                    "10.5万円",
                    "11万円",
                    "11.5万円",
                    "12万円",
                    "12.5万円",
                    "13万円",
                    "13.5万円",
                    "14万円",
                    "14.5万円",
                    "15万円",
                    "16万円",
                    "17万円",
                    "18万円",
                    "19万円",
                    "20万円",
                    "21万円",
                    "22万円",
                    "23万円",
                    "24万円",
                    "25万円",
                    "30万円",
                    "50万円",
                    "100万円",
                ],
                limit_cost: [
                    "上限なし",
                    "3万円",
                    "3.5万円",
                    "4万円",
                    "4.5万円",
                    "5万円",
                    "5.5万円",
                    "6万円",
                    "6.5万円",
                    "7万円",
                    "7.5万円",
                    "8万円",
                    "8.5万円",
                    "9万円",
                    "9.5万円",
                    "10万円",
                    "10.5万円",
                    "11万円",
                    "11.5万円",
                    "12万円",
                    "12.5万円",
                    "13万円",
                    "13.5万円",
                    "14万円",
                    "14.5万円",
                    "15万円",
                    "16万円",
                    "17万円",
                    "18万円",
                    "19万円",
                    "20万円",
                    "21万円",
                    "22万円",
                    "23万円",
                    "24万円",
                    "25万円",
                    "30万円",
                    "50万円",
                    "100万円",
                ],
            }
        },
        methods: {
            reset_cost: function (event) {
                this.s_costs = [];
            },
            add_cost: function (event) {
                this.dialog = false;
            },
        }
    }
</script>
