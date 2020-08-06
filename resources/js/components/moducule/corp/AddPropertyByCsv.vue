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
                        @click="submit"
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
                    ></v-file-input>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
    export default {
        data: {
            return {

            }
        },
        methods: {
            downloadTemplate: function () {
                const blob = new Blob();
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = label;
                link.click();
                URL.revokeObjectURL(link.href);
            }
        },
    };
</script>
