<template>
    <div class="corp-index pa-2">
        <div class="corp-index__wrap">
            <v-card
                class="pa-5"
            >
                <v-expansion-panels
                    tile
                    flat
                >
                    <v-expansion-panel>
                        <v-expansion-panel-header>
                            CSV取り込み（ベータ版）
                        </v-expansion-panel-header>
                        <v-expansion-panel-content>
                            <add-property-by-csv></add-property-by-csv>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>
                <v-divider class="mb-3"></v-divider>
                <v-tabs
                    color="#76c3bf"
                >
                    <v-tab>
                        登録フォーム
                    </v-tab>
                    <v-tab>
                        プレビュー
                    </v-tab>
                    <v-tab-item>
                        <corp-register
                            :property="this.property"
                            snackbar_text_success="物件を登録しました"
                            @saved="haltEdited"
                        ></corp-register>
                    </v-tab-item>
                    <v-tab-item>
                        <div class="corp-index__preview">
                            <house-detail
                                :house_property="this.property"
                                :house_property_images="target_images"
                            ></house-detail>
                        </div>
                    </v-tab-item>
                </v-tabs>
            </v-card>
        </div>
    </div>
</template>

<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .corp-index
        &__wrap
            position: relative

        &__preview
            margin: 20px auto
            max-width: 540px
            padding: 10px
            border: 1px solid #ccc

</style>

<script>
    import VueUploadMultipleImage from 'vue-upload-multiple-image';
    import AddPropertyByCsv from "../../moducule/corp/AddPropertyByCsv";
    import CorpRegister from "../../organism/corp/CorpRegister";
    import HouseDetail from "../../organism/HouseDetail";

    export default {
        components: {
            CorpRegister,
            AddPropertyByCsv,
            VueUploadMultipleImage,
            HouseDetail,
        },
        computed: {
            corpName: {
                get() {
                    return this.$store.state.auth_corp.corp_name;
                }
            },
            corpId: {
                get() {
                    return this.$store.state.auth_corp.id;
                }
            }
        },
        watch: {
            property: {
                handler (val) {
                    this.target_images = val.images.map(function(image) {
                        image.image_path = image.path;
                        return image;
                    });
                    this.isEdited = true;
                    console.log('watch');
                    console.log(val);
                },
                deep: true,
            },
        },
        beforeRouteLeave(to, from, next) {
            if (this.isEdited) {
                const answer = window.confirm("編集中の内容は破棄されます。移動してよろしいですか？");
                if (answer) {
                    next();
                } else {
                    next(false);
                }
            } else {
                next();
            }
        },
        data() {
            return {
                isEdited: false,
                rule_required:
                    [
                        v => !!v || 'この項目は必須です',
                    ],
                rule_limit200:
                    [
                        v => !v || v.length <= 200 || 'この項目は200文字が最大です。',
                    ],
                rule_required_limit200:
                    [
                        v => !!v || 'この項目は必須です',
                        v => !v || v.length <= 200 || 'この項目は200文字が最大です。',
                    ],
                images: [],
                property: {
                    type: "賃貸",
                    is_pet: "可",
                    start_date: new Date().toISOString().substr(0, 10),
                    images: [],
                },
                types: ["賃貸"],
                property_types: ["マンション", "アパート", "戸建て", "テラスハウス", "シェアハウス"],
                pet_types: ["犬", "猫", "犬と猫"],
                pet_cnt: ["1", "2", "3", "4", "5", "上限なし", "お問い合わせください"],
                minutes_on: [
                    "徒歩1分", "徒歩2分", "徒歩3分", "徒歩4分", "徒歩5分",
                    "徒歩6分", "徒歩7分", "徒歩8分", "徒歩9分", "徒歩10分",
                    "徒歩11分", "徒歩12分", "徒歩13分", "徒歩14分", "徒歩15分",
                    "徒歩16分", "徒歩17分", "徒歩18分", "徒歩19分", "徒歩20分",
                    "徒歩21分", "徒歩22分", "徒歩23分", "徒歩24分", "徒歩25分",
                    "徒歩26分", "徒歩27分", "徒歩28分", "徒歩29分", "徒歩30分",
                ],
                deposit: ["0ヵ月分", "1ヶ月分", "2ヶ月分", "3ヶ月分", "4ヶ月分", "5ヶ月分", "お問い合わせください"],
                key_money: ["0ヵ月分", "1ヶ月分", "2ヶ月分", "3ヶ月分", "4ヶ月分", "5ヶ月分", "お問い合わせください"],
                floor_plan: [
                    "1LDK", "1DK", "1SLDK", "1K", "1R",
                    "2LDK", "2DK", "2SLDK", "2K", "2R",
                    "3LDK", "3DK", "3SLDK", "3K", "3R",
                    "4LDK", "4DK", "4SLDK", "4K", "4R",
                    "5LDK", "5DK", "5SLDK", "5K", "5R",
                    "6LDK", "6DK", "6SLDK", "6K", "6R",
                    "7LDK", "7DK", "7SLDK", "7K", "7R",
                ],
                is_pet: ["可"],
                structure: ["木造", "鉄骨造", "鉄筋コンクリート", "鉄骨鉄筋コンクリート", "その他"],
                park: ["有", "無"],
                target_images: [],
            }
        },
        methods: {
            haltEdited () {
                setTimeout(() =>
                    this.isEdited = false,
                    500
                );
                console.log('halt');
            }
        },
    }
</script>
