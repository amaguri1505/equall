<template>
    <div class="search-detail-area">
        <v-dialog
            v-model="dialog"
            hide-overlay
            max-width="500"
            height="400"
        >
            <template v-slot:activator="{ on }">
                <div class="search-detail-area__wrap">
                    <div class="search-detail-area__chip-wrap">
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
                        <v-chip
                            v-if="decided_ward.chip"
                            dark
                            color="#f09299"
                            v-for="decided_ward in decided_wards"
                            :key="decided_ward.name"
                            class="mt-1"
                            close
                            @click:close="decided_ward.chip=false"
                        >
                            {{ decided_ward.name }}
                        </v-chip>
                    </div>
                </div>
            </template>

            <v-card
                class="pa-5"
            >
                <v-card-content>
                    <v-form>
                        <v-checkbox
                            v-for="ward in wards"
                            v-model="selected_ward"
                            :key="ward.name"
                            :label="ward.name"
                            :value="ward.name"
                        ></v-checkbox>
                    </v-form>
                </v-card-content>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="add_value"
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
                selected_ward: [],
                decided_wards: [],
                wards: [
                    {name: "千代田区",},
                    {name: "中央区",},
                    {name: "港区",},
                    {name: "新宿区",},
                    {name: "文京区",},
                    {name: "台東区",},
                    {name: "墨田区",},
                    {name: "江東区",},
                    {name: "品川区",},
                    {name: "目黒区",},
                    {name: "大田区",},
                    {name: "世田谷区",},
                    {name: "渋谷区",},
                    {name: "中野区",},
                    {name: "杉並区",},
                    {name: "豊島区",},
                    {name: "北区",},
                    {name: "荒川区",},
                    {name: "板橋区",},
                    {name: "練馬区",},
                    {name: "足立区",},
                    {name: "葛飾区",},
                    {name: "江戸川区",},
                ]
            }
        },
        methods: {
            add_value: function (event) {
                let myward = this.selected_ward;
                let this_ = this;
                myward.map(function (key, value) {
                    this_.decided_wards.push( {
                        name: key,
                        chip: true,
                    });
                });
                this.$store.dispatch('addSearchAreas', this.decided_wards);
                this.dialog = false;
            }
        },
    }
</script>

