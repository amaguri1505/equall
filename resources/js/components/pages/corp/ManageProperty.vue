<template>
    <div class="manage-property pa-2">
        <div class="manage-property__table-wrap">
            <v-data-table
                :headers="headers"
                :items="tableProperties"
                item-key="id"
                class="manage-property__table"
            >
                <!--<template v-slot:item.publish_flg="{ item }">-->
                <!--<v-switch v-model="switch1" :label="`Switch 1: ${switch1.toString()}`"></v-switch>-->
                <!--</template>-->


                <template v-slot:item.action="{ item }">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-icon
                                class="mr-2"
                                @click="editProperty(item)"
                                v-on="on"
                                :disabled="item.is_published !== 0"
                            >
                                mdi-pencil
                            </v-icon>
                        </template>
                        <span>編集する</span>
                    </v-tooltip>

                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-icon
                                class="mr-2"
                                @click="stopProperty(item)"
                                v-on="on"
                                :disabled="item.is_published === 0"
                            >
                                mdi-stop-circle-outline
                            </v-icon>
                        </template>
                        <span>公開を終了する</span>
                    </v-tooltip>

                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-icon
                                @click="deleteProperty(item)"
                                v-on="on"
                                :disabled="item.is_published !== 0"
                            >
                                mdi-delete
                            </v-icon>
                        </template>
                        <span>削除する</span>
                    </v-tooltip>
                </template>

                <template v-slot:top>
                    <v-dialog v-model="dialog">
                        <v-toolbar color="#76c3bf">
                            <v-btn dark icon @click="dialog = false">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-toolbar>
                        <v-card>
                            <corp-register
                                :property="property"
                                snackbar_text_success="不動産情報を更新しました"
                                @saved="close"
                            ></corp-register>
                        </v-card>
                    </v-dialog>
                </template>
            </v-data-table>
        </div>
    </div>
</template>

<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .manage-property
        &__wrap
            position: relative

</style>

<script>
    import CorpRegister from "../../organism/corp/CorpRegister";

    export default {
        components: {CorpRegister},
        computed: {
            tableProperties: function () {
                return this.properties.map(property => {
                    const today = new Date().toISOString().substr(0, 10);
                    const start_date = new Date(property.start_date).toISOString().substr(0, 10);
                    const end_date = new Date(property.end_date).toISOString().substr(0, 10);
                    const created_date = new Date(property.created_at).toISOString().substr(0, 10);
                    const updated_date = new Date(property.updated_at).toISOString().substr(0, 10);
                    return {
                        id: property.id,
                        publish_flg: start_date <= today && today <= end_date && property.is_published > 0 ? "公開" : "未公開",
                        is_published: property.is_published,
                        end_date: property.end_date,
                        created_at: created_date,
                        updated_at: updated_date,
                        name: property.name,
                        cost: property.cost,
                        inquiry_cnt: property.inquiries_count,
                    }
                });
            },
        },
        methods: {
            editProperty: function (item) {
                this.property =
                    this.properties.filter(property => property.id == item.id)[0];
                this.dialog = true;
            },
            deleteProperty: function (property) {
                if (!confirm('選択した不動産情報を削除します')) {
                    return false;
                }
                this.$store.dispatch('modifyOverlay', true);
                this.$http.post('/api/delete-property', property
                ).then(response => {
                    const index = this.properties.findIndex(({ id }) => id === property.id);
                    this.properties.splice(index, 1);
                    this.$store.dispatch('modifySnackText', '不動産情報を削除しました');
                    this.$store.dispatch('modifySnackColor', '#76c3bf');
                    this.$store.dispatch('modifySnackbar', true);
                    this.$store.dispatch('modifyOverlay', false);
                }).catch(error => {
                    this.$store.dispatch('modifySnackText', '不動産情報の削除に失敗しました');
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                    this.$store.dispatch('modifyOverlay', false);
                });
            },
            stopProperty: function (property) {
                if (!confirm('この操作は取り消せません。本当に公開を停止しますか？')) {
                    return false;
                }
                this.$store.dispatch('modifyOverlay', true);
                this.$http.post('/api/close-property', property
                ).then(response => {
                    const index = this.properties.findIndex(({ id }) => id === property.id);
                    this.properties[index].is_published = 0;
                    this.$store.dispatch('modifySnackText', '不動産を非公開にしました');
                    this.$store.dispatch('modifySnackColor', '#76c3bf');
                    this.$store.dispatch('modifySnackbar', true);
                    this.$store.dispatch('modifyOverlay', false);
                }).catch(error => {
                    this.$store.dispatch('modifySnackText', '不動産情報の変更に失敗しました');
                    this.$store.dispatch('modifySnackColor', 'warning');
                    this.$store.dispatch('modifySnackbar', true);
                    this.$store.dispatch('modifyOverlay', false);
                });
            },

            close() {
                this.property = [];
                this.dialog = false;
            },

            save() {
                this.close();
            },
        },
        data() {
            return {
                dialog: false,
                property: [],
                selected: [],
                headers: [
                    {
                        text: '公開状況',
                        value: 'publish_flg',
                        align: 'center',
                    },
                    {
                        text: '掲載終了日',
                        value: 'end_date',
                        align: 'center',
                        dataType: 'Date',
                    },
                    {
                        text: '登録日',
                        value: 'created_at',
                        align: 'center',
                        dataType: 'Date',
                    },
                    {
                        text: '更新日',
                        value: 'updated_at',
                        align: 'center',
                        dataType: 'Date',
                    },
                    {
                        text: '物件名',
                        value: 'name',
                        align: 'center',
                    },
                    {
                        text: '家賃',
                        value: 'cost',
                        align: 'center',
                    },
                    {
                        text: '問い合わせ数',
                        value: 'inquiry_cnt',
                        align: 'center',
                    },
                    {
                        text: '操作',
                        value: 'action',
                        align: 'center',
                    },
                ],
                properties: [],
            }
        },
        created() {
            this.$store.dispatch('modifyOverlay', true);
            this.$http
                .get('/api/get-properties-by-corp')
                .then(response => {
                    this.properties = response.data;
                    this.$store.dispatch('modifyOverlay', false);
                });
        },
    }
</script>
