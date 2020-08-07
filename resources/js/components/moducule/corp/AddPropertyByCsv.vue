<template>
    <div class="add-property-by-csv mb-4">
        <v-subheader>
            CSV取り込み（ベータ版）
        </v-subheader>
        <v-container>
            <v-row>
                <v-col
                    cols="4"
                >
                    <v-btn
                        color="#76c3bf"
                        dark
                        class="mr-4"
                        @click="downloadTemplate"
                    >
                        テンプレートをダウンロード
                    </v-btn>
                </v-col>
                <v-col
                    cols="8"
                >
                    <v-file-input
                        color="#76c3bf"
                        class="pa-0"
                        label="CSVを取り込み"
                        @change="loadCsvFile"
                    ></v-file-input>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csv_title:
                    "type,is_pet,property_type,name,hitokoto,"
                    + "good,bad,pet_types,pet_cnt,nearest_station,"
                    + "minutes_on,address,cost,manage_cost,deposit,"
                    + "deposit_for_pet,key_moeny,deposit_ex,update_cost,insurance,"
                    + "insurance_corp,cost_memo,deal_form,area,floor_plan,"
                    + "floor,age,structure,park,other_condition,"
                    + "start_date"
                    + "\n",
            }
        },
        methods: {
            downloadTemplate: function () {
                const blob = new Blob([this.csv_title], {type: 'text/csv'});
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'equall_property.csv';
                link.click();
                URL.revokeObjectURL(link.href);
            },
            loadCsvFile: function (file) {
                if (!file.type.match("text/csv")) {
                    this.$store.dispatch('modifySnackText', "CSVファイルを取り込んでください");
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                    return false;
                }

                const reader = new FileReader();
                const workers = [];

                const loadFunc = () => {
                    const lines = reader.result.split("\n");
                    console.log(lines);
                    lines.forEach(element => {
                        const workerData = element.split(",");
                        if (workerData.length != 31) {
                            this.$store.dispatch('modifySnackText', "CSVの列数が足りません");
                            this.$store.dispatch('modifySnackColor', 'warning');
                            this.$store.dispatch('modifySnackbar', true);
                            return false;
                        }
                        const worker = {
                            type: workerData[0],
                            is_pet: workerData[1],
                            property_type: workerData[2],
                            name: workerData[3],
                            hitokoto: workerData[4],
                            good: workerData[5],
                            bad: workerData[6],
                            pet_types: workerData[7],
                            pet_cnt: workerData[8],
                            nearest_station: workerData[9],
                            minutes_on: workerData[10],
                            address: workerData[11],
                            cost: workerData[12],
                            manage_cost: workerData[13],
                            deposit: workerData[14],
                            deposit_for_pet: workerData[15],
                            key_money: workerData[16],
                            deposit_ex: workerData[17],
                            update_cost: workerData[18],
                            insurance: workerData[19],
                            insurance_corp: workerData[20],
                            cost_memo: workerData[21],
                            deal_form: workerData[22],
                            area: workerData[23],
                            floor_plan: workerData[24],
                            floor: workerData[25],
                            age: workerData[26],
                            structure: workerData[27],
                            park: workerData[28],
                            other_condition: workerData[29],
                            start_date: workerData[30],
                        };
                        workers.push(worker);
                    });
                    this.$store.dispatch('modifyOverlay', true);
                    console.log(workers);
                    this.$http.post('/api/add-properties', workers).then(response => {
                        this.$store.dispatch('modifyOverlay', false);
                        this.$store.dispatch('modifySnackText', "CSV取り込みが完了しました");
                        this.$store.dispatch('modifySnackColor', '#76c3bf');
                        this.$store.dispatch('modifySnackbar', true);
                    }).catch(error => {
                        this.$store.dispatch('modifyOverlay', false);
                        this.$store.dispatch('modifySnackText',
                            "CSV取り込みに失敗しました："
                            + error.toString()
                        );
                        this.$store.dispatch('modifySnackColor', 'warning');
                        this.$store.dispatch('modifySnackbar', true);
                    });
                };

                reader.onload = loadFunc;
                reader.readAsBinaryString(file);
            },
        },
    };
</script>
