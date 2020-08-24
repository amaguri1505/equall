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
                        <div
                            class="corp-index__card-wrap pa-3 mx-3"
                        >
                            <v-img
                                :src="item.img_src"
                                class="corp-index__image"
                            ></v-img>
                            <v-card
                                color="rgb(245,245,245)"
                                :to="item.to"
                                class="corp-index__card text-center py-auto ma-3"
                                flat
                                outlined
                            >
                                <v-list-item three-line>
                                    <v-list-item-content>
                                        <v-list-item-title
                                        >
                                            <v-icon>
                                                {{ item.icon }}
                                            </v-icon>
                                            {{ item.text }}
                                        </v-list-item-title>
                                        <v-list-item-subtitle>
                                            {{ item.content }}
                                        </v-list-item-subtitle>
                                    </v-list-item-content>
                                </v-list-item>
                            </v-card>
                        </div>
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
                {
                    text: '物件管理',
                    icon: 'mdi-home-city-outline',
                    to: '/corp/manage-property',
                    content: '現在の登録中の物件を確認できます',
                    img_src: '/images/equall_dog.png'
                },
                {
                    text: '物件登録',
                    icon: 'mdi-home-variant-outline',
                    to: '/corp/register-property',
                    content: '新規の物件はこちらから登録できます',
                    img_src: '/images/equall_cat.png'
                },
                {
                    text: '問い合わせ管理',
                    icon: 'mdi-email-outline',
                    to: '/corp/manage-inquiry',
                    content: 'お客様からのお問い合わせを確認できます',
                    img_src: '/images/equall_girl.png'
                },
            ]
        })
    }

</script>

<style lang="sass">
    @import "../../../../sass/common/_variable.scss"

    .corp-index
        &__wrap
            position: relative
            padding-top: 20px

        &__card-wrap
            position: relative
            background-color: white

        &__card
            margin: 10px
            height: 100px
            border-color: #ccc !important

        &__image
            position: absolute
            right: 5px
            bottom: 5px
            width: 14%
            height: auto
            z-index: 9999

</style>
