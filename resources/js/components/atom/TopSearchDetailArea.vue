<template>
    <div class="search-detail-area">
        <v-dialog
            v-model="dialog"
            hide-overlay
            max-width="500"
            height="400"
        >
            <template v-slot:activator="{ on }">
                <div class="search-detail-area__wrap">
                    <div class="search-detail-area__chip-wrap">
                        <v-icon
                            color="white"
                            class="search-detail-train__icon"
                            v-on="on"
                        >
                            mdi-map-search
                        </v-icon>
                        <div class="search-detail-train__text">
                            エリアで探す
                        </div>
                        <v-chip
                            v-if="decided_ward.chip"
                            dark
                            color="#f09299"
                            v-for="decided_ward in decided_wards.slice(0, 3)"
                            :key="decided_ward.name"
                            class="mt-1"
                        >
                            {{ decided_ward.name }}
                        </v-chip>
                        <v-chip
                            v-if="decided_wards.length >= 4"
                            dark
                            color="#f09299"
                            class="mt-1"
                        >
                            その他{{ decided_wards.length - 3 }}箇所
                        </v-chip>
                    </div>
                </div>
            </template>

            <v-card
                class="pa-5"
            >
                <v-card-content>
                    <v-form>
                        <v-list>
                            <v-list-group
                                v-for="prefecture in prefectures"
                                :key="prefecture.name"
                            >
                                <template #activator>
                                    <v-list-item-title
                                        v-text="prefecture.name"
                                    >
                                    </v-list-item-title>
                                </template>
                                <v-list-item
                                    v-for="ward in prefecture.wards"
                                    :key="ward.name"
                                >
                                    <template #default="{active}">
                                        <v-list-item-action>
                                            <v-checkbox
                                                :value="ward.name"
                                                v-model="selected_ward"
                                            ></v-checkbox>
                                        </v-list-item-action>
                                        <v-list-item-content>
                                            {{ ward.name }}
                                        </v-list-item-content>
                                    </template>
                                </v-list-item>
                            </v-list-group>
                        </v-list>
                    </v-form>
                </v-card-content>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="add_value"
                    >
                        エリアを条件に追加
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<style lang="sass">
    .search-detail-area
        text-align: center

        &__icon
            font-size: 80px !important

        &__text
            color: white

</style>
<script>
    export default {
        data() {
            return {
                dialog: false,
                selected_ward: [],
                decided_wards: [],
                prefectures: [
                    {
                        name: "東京都",
                        wards: [
                            {name: "世田谷区"},
                            {name: "目黒区"},
                            {name: "港区"},
                            {name: "渋谷区"},
                            {name: "新宿区"},
                            {name: "江東区"},
                            {name: "中野区"},
                            {name: "文京区"},
                            {name: "台東区"},
                            {name: "墨田区"},
                            {name: "大田区"},
                            {name: "品川区"},
                            {name: "千代田区"},
                            {name: "中央区"},
                            {name: "杉並区"},
                            {name: "豊島区"},
                            {name: "北区"},
                            {name: "荒川区"},
                            {name: "板橋区"},
                            {name: "練馬区"},
                            {name: "足立区"},
                            {name: "葛飾区"},
                            {name: "江戸川区"},
                            {name: "八王子市"},
                            {name: "立川市"},
                            {name: "武蔵野市"},
                            {name: "三鷹市"},
                            {name: "町田市"},
                            {name: "国分寺市"},
                            {name: "国立市"},
                            {name: "多摩市"},
                            {name: "府中市"},
                            {name: "青梅市"},
                            {name: "調布市"},
                            {name: "小金井市"},
                            {name: "昭島市"},
                            {name: "小平市"},
                            {name: "日野市"},
                            {name: "東村山市"},
                            {name: "狛江市"},
                            {name: "東大和市"},
                            {name: "清瀬市"},
                            {name: "東久留米市"},
                            {name: "武蔵村山市"},
                            {name: "福生市"},
                            {name: "稲城市"},
                            {name: "羽村市"},
                            {name: "あきる野市"},
                            {name: "西東京市"},
                            {name: "瑞穂町"},
                            {name: "日の出町"},
                            {name: "檜原村"},
                            {name: "奥多摩町"},
                            {name: "大島町"},
                            {name: "利島村"},
                            {name: "新島村"},
                            {name: "神津島村"},
                            {name: "三宅村"},
                            {name: "御蔵島村"},
                            {name: "八丈町"},
                            {name: "青ヶ島村"},
                            {name: "小笠原村"},
                        ],
                    },
                    {
                        name: "神奈川県",
                        wards: [
                            {name: "鶴見区"},
                            {name: "神奈川区"},
                            {name: "西区"},
                            {name: "中区"},
                            {name: "南区"},
                            {name: "港南区"},
                            {name: "保土ケ谷区"},
                            {name: "旭区"},
                            {name: "磯子区"},
                            {name: "金沢区"},
                            {name: "港北区"},
                            {name: "緑区"},
                            {name: "青葉区"},
                            {name: "都筑区"},
                            {name: "戸塚区"},
                            {name: "栄区"},
                            {name: "泉区"},
                            {name: "瀬谷区"},
                            {name: "川崎市"},
                            {name: "相模原市"},
                            {name: "横須賀市"},
                            {name: "平塚市"},
                            {name: "鎌倉市"},
                            {name: "藤沢市"},
                            {name: "小田原市"},
                            {name: "茅ヶ崎市"},
                            {name: "逗子市"},
                            {name: "三浦市"},
                            {name: "海老名市"},
                            {name: "厚木市"},
                            {name: "大和市"},
                            {name: "伊勢原市"},
                            {name: "秦野市"},
                            {name: "座間市"},
                            {name: "南足柄市"},
                            {name: "綾瀬市"},
                            {name: "三浦郡"},
                            {name: "葉山町"},
                            {name: "高座郡"},
                            {name: "寒川町"},
                            {name: "中郡"},
                            {name: "大磯町"},
                            {name: "二宮町"},
                            {name: "足柄上郡"},
                            {name: "中井町"},
                            {name: "大井町"},
                            {name: "松田町"},
                            {name: "山北町"},
                            {name: "開成町"},
                            {name: "足柄下郡"},
                            {name: "箱根町"},
                            {name: "真鶴町"},
                            {name: "湯河原町"},
                            {name: "愛甲郡"},
                            {name: "愛川町"},
                            {name: "清川村"},
                        ],
                    },
                    {
                        name: "埼玉県",
                        wards: [
                            {name: "さいたま市"},
                            {name: "川越市"},
                            {name: "川口市"},
                            {name: "所沢市"},
                            {name: "越谷市"},
                            {name: "飯能市"},
                            {name: "熊谷市"},
                            {name: "春日部市"},
                            {name: "草加市"},
                            {name: "行田市"},
                            {name: "東松山市"},
                            {name: "加須市"},
                            {name: "狭山市"},
                            {name: "羽生市"},
                            {name: "鴻巣市"},
                            {name: "深谷市"},
                            {name: "上尾市"},
                            {name: "本庄市"},
                            {name: "秩父市"},
                            {name: "蕨市"},
                            {name: "戸田市"},
                            {name: "入間市"},
                            {name: "朝霞市"},
                            {name: "志木市"},
                            {name: "和光市"},
                            {name: "新座市"},
                            {name: "桶川市"},
                            {name: "久喜市"},
                            {name: "北本市"},
                            {name: "八潮市"},
                            {name: "富士見市"},
                            {name: "三郷市"},
                            {name: "蓮田市"},
                            {name: "坂戸市"},
                            {name: "幸手市"},
                            {name: "鶴ヶ島市"},
                            {name: "日高市"},
                            {name: "吉川市"},
                            {name: "ふじみ野市"},
                            {name: "白岡市"},
                            {name: "北足立郡"},
                            {name: "伊奈町"},
                            {name: "入間郡"},
                            {name: "三芳町"},
                            {name: "毛呂山町"},
                            {name: "越生町"},
                            {name: "比企郡"},
                            {name: "滑川町"},
                            {name: "嵐山町"},
                            {name: "小川町"},
                            {name: "川島町"},
                            {name: "吉見町"},
                            {name: "鳩山町"},
                            {name: "ときがわ町"},
                            {name: "秩父郡"},
                            {name: "横瀬町"},
                            {name: "皆野町"},
                            {name: "長瀞町"},
                            {name: "小鹿野町"},
                            {name: "東秩父村"},
                            {name: "児玉郡"},
                            {name: "美里町"},
                            {name: "神川町"},
                            {name: "上里町"},
                            {name: "大里郡"},
                            {name: "寄居町"},
                            {name: "南埼玉郡"},
                            {name: "宮代町"},
                            {name: "北葛飾郡"},
                            {name: "杉戸町"},
                            {name: "松伏町"},
                        ],
                    },
                    {
                        name: "千葉県",
                        wards: [
                            {name: "千葉市"},
                            {name: "市川市"},
                            {name: "木更津市"},
                            {name: "船橋市"},
                            {name: "成田市"},
                            {name: "柏市"},
                            {name: "市原市"},
                            {name: "浦安市"},
                            {name: "松戸市"},
                            {name: "習志野市"},
                            {name: "館山市"},
                            {name: "銚子市"},
                            {name: "勝浦市"},
                            {name: "野田市"},
                            {name: "茂原市"},
                            {name: "佐倉市"},
                            {name: "東金市"},
                            {name: "旭市"},
                            {name: "流山市"},
                            {name: "八千代市"},
                            {name: "我孫子市"},
                            {name: "鴨川市"},
                            {name: "鎌ケ谷市"},
                            {name: "君津市"},
                            {name: "富津市"},
                            {name: "四街道市"},
                            {name: "袖ケ浦市"},
                            {name: "八街市"},
                            {name: "印西市"},
                            {name: "白井市"},
                            {name: "富里市"},
                            {name: "南房総市"},
                            {name: "匝瑳市"},
                            {name: "香取市"},
                            {name: "山武市"},
                            {name: "いすみ市"},
                            {name: "大網白里市"},
                            {name: "印旛郡"},
                            {name: "酒々井町"},
                            {name: "栄町"},
                            {name: "香取郡"},
                            {name: "神崎町"},
                            {name: "多古町"},
                            {name: "東庄町"},
                            {name: "山武郡"},
                            {name: "九十九里町"},
                            {name: "芝山町"},
                            {name: "横芝光町"},
                            {name: "長生郡"},
                            {name: "一宮町"},
                            {name: "睦沢町"},
                            {name: "長生村"},
                            {name: "白子町"},
                            {name: "長柄町"},
                            {name: "長南町"},
                            {name: "夷隅郡"},
                            {name: "大多喜町"},
                            {name: "御宿町"},
                            {name: "安房郡"},
                            {name: "鋸南町"},
                        ],
                    },
                ]
            }
        },
        methods: {
            add_value: function (event) {
                let myward = this.selected_ward;
                let this_ = this;
                this.decided_wards = [];
                myward.map(function (key, value) {
                    this_.decided_wards.push( {
                        name: key,
                        chip: true,
                    });
                });
                this.$store.dispatch('addSearchAreas', this.decided_wards);
                this.dialog = false;
            }
        },
    }
</script>

