<template>
    <footer>
        <div class="footer__divider-wrap">
            <v-divider></v-divider>
        </div>
        <div class="pa-4 footer__life-banner-wrap">
            <a href="https://media.equall.jp/" target="_blank">
                <v-img src="/images/equalllink_bnr_2.png"></v-img>
            </a>
        </div>
        <div class="footer__message">
            SNSで最新情報配信中
        </div>
        <div class="pa-4 footer__line-banner-wrap">
            <a href="https://lin.ee/3nKb7nm/" target="_blank">
                <v-img src="/images/line_link_5554aa99.png"></v-img>
            </a>
        </div>
        <div class="text-center footer__sns-wrap">
            <a href="https://instagram.com/equall.jp" target="_blank" class="ml-auto d-inline-block">
                <v-img width=50 src="/images/instagram_green_logo2.png"></v-img>
            </a>
            <a href="https://twitter.com/equall_jp" target="_blank" class="ml-2 mr-2 d-inline-block">
                <v-img width=50 src="/images/twitter_green.png"></v-img>
            </a>
            <a href="https://www.facebook.com/equall.jp/" target="_blank" class="mr-auto d-inline-block">
                <v-img width=50 src="/images/equall_fb.png"></v-img>
            </a>
        </div>
        <div class="footer__link-table-wrap">
            <v-container pa-0>
                <v-row no-gutters>
                    <v-col cols="12">
                        <v-card to="/real-estates-for-dog" class="text-center pa-2" outlined>
                            わんちゃん用物件
                        </v-card>
                    </v-col>
                    <v-col cols="12">
                        <v-card to="/real-estates-for-cat" class="text-center pa-2" outlined>
                            ねこちゃん用物件
                        </v-card>
                    </v-col>
                    <v-col cols="6">
                        <v-card to="/login" class="text-center pa-2" outlined>
                            登録/ログイン
                        </v-card>
                    </v-col>
                    <v-col cols="6">
                        <v-card to="/bookmark" class="text-center pa-2" outlined>
                            お気に入り
                        </v-card>
                    </v-col>
                    <v-col cols="6">
                        <v-card to="/relationship" class="text-center pa-2" outlined>
                            物件提携希望の方
                        </v-card>
                    </v-col>
                    <v-col cols="6">
                        <v-card href="mailto:info@equall.jp" class="text-center pa-2" outlined>
                            お問い合わせ
                        </v-card>
                    </v-col>
                    <v-col cols="6">
                        <v-card to="/terms" height="4rem" class="text-center pa-2" outlined>
                            利用規約<br/>
                            プライバシーポリシー
                        </v-card>
                    </v-col>
                    <v-col cols="6">
                        <v-card height="4rem" href="https://corp.equall.jp/" target="_blank" class="text-center pa-4"
                                outlined>
                            運営会社
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </div>
        <div class="footer__text">
            (c) 2020 equall CO., LTD. ALL RIGHTS RESERVED
        </div>
    </footer>
</template>
<style lang="sass">
    .footer
        &__message
            text-align: center

        &__text
            font-size: 12px
            text-align: center
            padding: 5px

        &__divider-wrap
            padding: 0 20px

</style>
