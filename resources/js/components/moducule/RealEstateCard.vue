<template>
    <div class="re-card">
        <v-container fluid>
            <v-row>
                <v-col
                    cols="6"
                >
                    <div class="re-card__thumb">
                        <v-img src="/images/samplees.jpg"></v-img>
                    </div>
                </v-col>
                <v-col
                    cols="6"
                >
                    <div class="re-card__detail-wrap">
                        <div class="re-card__pets">
                            ペット：猫・犬
                        </div>
                        <div class="re-card__name">
                            サンプル不動産
                        </div>
                        <div class="recard__station">
                            サンプル駅
                        </div>
                        <div class="re-card__cost">
                            家賃：10万円
                        </div>
                        <div class="re-card__plan">
                            1LDK / 30㎡
                        </div>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<style lang="sass">
    .re-card
        a
            color: #333

            &:hover, &:visited, &:link, &:active
                color: #333

        &__detail-wrap
            line-height: 1.5rem

</style>
