<template>
    <div class="beginners-guide">
        <div class="beginners-guide__title">
            <v-icon color="#76c3bf">
                mdi-coffee-outline
            </v-icon>
            初めて利用される方へ
        </div>
        <v-divider></v-divider>
        <div class="beginners-guide__whats-equall">
            <balloon-text
                text="equall（イコール）とは？"
                img="/images/equall_icon.png"
                class="beginners-guide__balloon"
            ></balloon-text>
            equallは、<span class="beginners-guide__mark">ペットと暮らせるおうち検索サービス</span>です。<br>
            <br>
            ペットと暮らせるおうちは、全国的にまだまだ少ない為、探すのが大変です。<br>
            equallでは、ペットと飼い主が快適な引っ越しや暮らしができるように「ペット可・ペット相談可物件」の掲載を行っています。<br>
            <br>
            また、物件情報だけではなく、ペットと暮らす為の豆知識やノウハウ、近隣の動物病院、公園、ペットショップ、トリミングサロンなどの施設情報もお届けします。<br>
            <br>
            <ul>
                <li>
                    <router-link
                        to="/real-estates-for-cat"
                    >
                        猫ちゃんと暮らせるおうち >>
                    </router-link>
                </li>
                <li>
                    <router-link
                        to="/real-estates-for-dog"
                    >
                        わんちゃんと暮らせるおうち >>
                    </router-link>
                </li>
                <li>
                    <a
                        target="_blank"
                        href="https://media.equall.jp/"
                    >
                        暮らしに関する情報 >>
                    </a>
                </li>
            </ul>
        </div>
        <div class="beginners-guide__about-estate">
            <balloon-text
                text="掲載物件に関して"
                img="/images/equall_icon.png"
                class="beginners-guide__balloon"
            ></balloon-text>
            <ul>
                <li>
                    equallに掲載されている物件はペットと暮らせるおうちを掲載している為、通常よりも敷金などの初期費用が掛かる場合があります。
                </li>
                <li>
                    ペットと暮らせる物件でもペットの大きさや種類、頭数によっては、入居が出来ない場合があるので、必ず事前にご確認下さい。
                </li>
                <li>
                    掲載されている物件は提携している企業が仲介や管理をされておりますので、詳細は物件詳細の問い合わせボタンよりご確認下さい。
                </li>
            </ul>
        </div>
        <div class="beginners-guide__howto">
            <balloon-text
                text="サイトの利用方法"
                img="/images/equall_icon.png"
                class="beginners-guide__balloon"
            ></balloon-text>
            <span class="font-weight-bold">STEP1</span><br>
            お好みの検索条件で物件を選びます。<br>
            <br>
            ▼検索条件<br>
            <ul>
                <li>
                    ペットの種類
                </li>
                <li>
                    路線・駅
                </li>
                <li>
                    エリア
                </li>
                <li>
                    価格
                </li>
                <li>
                    フリーワード
                </li>
            </ul>
            <br>
            <span class="font-weight-bold">STEP2</span><br>
            検索結果の中からお好みの物件をお選び下さい。<br>
            ※あとで詳細を物件をチェックしたい場合は、お気に入りボタンをクリック<br>
            <br>
            <span class="font-weight-bold">STEP3</span><br>
            気に入った物件の「お問い合わせ」ボタンより、物件掲載企業へお問い合わせください。<br>
            ※お問い合わせ後は、企業の担当者と内見や契約についてご調整下さい<br>
        </div>
        <div class="beginners-guide__link-btn mt-5">
            <v-btn
                color="#f09299"
                to="/"
                dark
            >
                物件を探す
            </v-btn>
        </div>
    </div>
</template>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"

    .beginners-guide
        margin-top: 48px
        padding: 40px 20px 80px 20px

        &__title
            color: colors(primary)
            text-align: center
            letter-spacing: 0.2rem
            font-size: 1.5rem

        &__link-btn
            text-align: center

        &__balloon
            margin-top: 50px
            margin-bottom: 50px

        &__mark
            background-color: #ff9

</style>
<script>
    import BalloonText from "../moducule/BalloonText";

    export default {
        components: {
            BalloonText,
        },
    }
</script>
