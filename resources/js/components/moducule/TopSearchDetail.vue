<template>
    <div class="search-detail">
        <v-container fluid>
            <v-row>
                <v-col
                    cols="4"
                >
                    <top-search-detail-train></top-search-detail-train>
                </v-col>
                <v-col
                    cols="4"
                >
                    <top-search-detail-area></top-search-detail-area>
                </v-col>
                <v-col
                    cols="4"
                >
                    <top-search-detail-cost></top-search-detail-cost>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
    import TopSearchDetailTrain from "../atom/TopSearchDetailTrain";
    import TopSearchDetailArea from "../atom/TopSearchDetailArea";
    import TopSearchDetailCost from "../atom/TopSearchDetailCost";

    export default {
        components: {
            TopSearchDetailTrain,
            TopSearchDetailArea,
            TopSearchDetailCost,
        },
    }
</script>
