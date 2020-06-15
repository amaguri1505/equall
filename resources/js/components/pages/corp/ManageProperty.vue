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
                    },
                    {
                        text: '登録日',
                        value: 'register_date',
                        align: 'center',
                    },
                    {
                        text: '更新日',
                        value: 'update_date',
                        align: 'center',
                    },
                    {
                        text: '物件名',
                        value: 'name',
                        align: 'center',
                    },
                    {
                        text: '家賃',
                        value: 'rent',
                        align: 'center',
                    },
                    {
                        text: '問い合わせ数',
                        value: 'inquiry_cnt',
                        align: 'center',
                    },
                ],
                properties: [
                    {
                        id: 1,
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                    {
                        publish_flg: "公開中",
                        end_date: "掲載終了日",
                        register_date: "2020/01/01",
                        update_date: "2020/01/01",
                        name: "コーポ新宿",
                        rent: "100,000円",
                        inquiry_cnt: "3件"
                    },
                ]
            }
        }
    }
</script>
