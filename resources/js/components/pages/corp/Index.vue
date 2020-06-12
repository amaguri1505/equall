<template>
    <div class="corp-index">
        <div class="corp-index__wrap">
            <v-container>
                <v-layout row>
                    <v-flex
                        v-for="(item, i) in items"
                        :key="i"
                        xs4
                    >
                        <v-card
                            v-text="item.text"
                            :to="item.to"
                            class="corp-index__card text-center py-auto"
                        ></v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </div>
    </div>
</template>
<script>
    export default {
        data: () => ({
            item: 1,
            items: [
                {text: '物件管理', icon: 'mdi-home-city-outline', to: '/corp/manage-property'},
                {text: '物件登録', icon: 'mdi-home-variant-outline', to: '/corp/register-property'},
                {text: '問い合わせ管理', icon: 'mdi-email-outline', to: '/corp/manage-inquery'},
            ]
        })
    }

</script>

<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .corp-index
        &__wrap
            position: relative

        &__card
            margin: 10px
            height: 200px
            padding: calc(100px - 0.5rem) 0

</style>
