<template>
    <div class="manage-inquiry pa-2">
        <div class="manage-inquiry__table-wrap">
            <v-data-table
                :headers="headers"
                :items="inquiries"
                item-key="name"
                show-select
                class="manage-inquiry__table"
            >
            </v-data-table>
        </div>
    </div>
</template>

<style lang="sass">
    @import "../../../../sass/common/_variable.scss"

</style>

<script>
    export default {
        data() {
            return {
                selected: [],
                headers: [
                    {
                        text: '年月',
                        value: 'date',
                        align: 'center',
                    },
                    {
                        text: '問い合わせ数',
                        value: 'inquiry_cnt',
                        align: 'center',
                    },
                    {
                        text: '掲載費用',
                        value: 'total_cost',
                        align: 'center',
                    },
                ],
                inquiries: [
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                    {
                        date: '2020年6月実績',
                        inquiry_cnt: '10件',
                        total_cost: '費用10,000円',
                    },
                ]
            }
        }
    }
</script>
