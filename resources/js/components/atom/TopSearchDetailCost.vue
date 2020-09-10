<template>
    <div class="search-detail-cost">
        <v-dialog
            v-model="dialog"
            hide-overlay
            max-width="500"
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
                        v-if="s_cost.chip && (cost.under || cost.limit)"
                        dark
                        color="#f09299"
                        class="mt-1"
                    >
                        {{ s_cost.name }}
                    </v-chip>
                </div>
            </template>

            <v-card
                class="pa-5"
            >
                <v-content>
                    <v-form>
                        <v-select
                            v-model="cost.under"
                            :items="costs"
                            :rules="[v => !!v || 'Item is required']"
                            label="家賃下限"
                            required
                        ></v-select>
                        <div>
                            〜
                        </div>
                        <v-select
                            v-model="cost.limit"
                            :items="costs"
                            :rules="[v => !!v || 'Item is required']"
                            label="家賃上限"
                            required
                        ></v-select>
                    </v-form>
                </v-content>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="add_cost"
                    >
                        価格を条件に追加
                    </v-btn>
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
                s_cost: [],
                costs: [
                    "設定なし",
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
            add_cost: function (event) {
                const under_cost = this.cost.under ? this.cost.under : "";
                const limit_cost = this.cost.limit ? this.cost.limit : "";
                this.s_cost = {
                    name: under_cost + "〜" + limit_cost,
                    chip: true,
                };
                this.$store.dispatch('addSearchCosts', this.s_cost);
                this.dialog=false;
            }
        }
    }
</script>
