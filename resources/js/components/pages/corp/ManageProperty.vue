<template>
    <div class="manage-property pa-2">
        <div class="manage-property__table-wrap">
            <v-data-table
                :headers="headers"
                :items="properties"
                item-key="id"
                show-select
                single-select=false
                class="manage-property__table"
            >
                <template v-slot:item.created_at="{ item }">
                    <span>{{new Date(item.created_at).toDateString()}}</span>
                </template>
                <template v-slot:item.end_date="{ item }">
                    <span>{{new Date(item.end_date).toDateString()}}</span>
                </template>
                <template v-slot:item.updated_at="{ item }">
                    <span>{{new Date(item.updated_at).toDateString()}}</span>
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
    export default {
        data() {
            return {
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
                ],
                properties: [],
                // properties: [
                //     {
                //         id: 1,
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                //     {
                //         publish_flg: "公開中",
                //         end_date: "掲載終了日",
                //         register_date: "2020/01/01",
                //         update_date: "2020/01/01",
                //         name: "コーポ新宿",
                //         rent: "100,000円",
                //         inquiry_cnt: "3件"
                //     },
                // ]
            }
        },
        created () {
            this.$http
                .get('/get-properties')
                .then(response => {
                    this.properties = response.data;
                });
        }
    }
</script>
