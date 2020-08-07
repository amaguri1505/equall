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
                        value: 'time',
                        align: 'center',
                    },
                    {
                        text: '問い合わせ数',
                        value: 'count',
                        align: 'center',
                    },
                    {
                        text: '掲載費用',
                        value: 'total_cost',
                        align: 'center',
                    },
                ],
                inquiries: [],
            }
        },
        created () {
            this.$store.dispatch('modifyOverlay', true);
            this.$http
                .get('/api/get-inquiries-by-corp')
                .then(response => {
                    this.inquiries = response.data;
                    this.$store.dispatch('modifyOverlay', false);
                });
        }
    }
</script>
