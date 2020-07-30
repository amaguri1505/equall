<template>
    <div class="corp-index pa-2">
        <div class="corp-index__wrap">
            <v-card
                class="pa-5"
            >
                <v-content>
                    <v-form
                        ref="form"
                        lazy-validation
                    >
                        <div class="corp-register__image-uploader-wrap">
                            <div class="corp-register__image-uploader-title">
                                不動産の画像
                            </div>
                            <vue-upload-multiple-image
                                @upload-success="uploadImageSuccess"
                                idUpload="myIdUpload"
                                editUpload="myIdEdit"
                                dragText="ここに画像をドラッグ"
                                browseText="画像を選択"
                                primaryText="先頭の画像"
                                markIsPrimaryText=""
                                popupText=""
                                dropText=""
                                :data-images="property.images"
                                ref="uploader"
                                maxImage="10"
                            ></vue-upload-multiple-image>
                        </div>

                        <v-select
                            v-model="property.type"
                            :items="types"
                            :rules="[v => !!v || 'Item is required']"
                            label="種類"
                            required
                        ></v-select>

                        <v-select
                            v-model="property.property_type"
                            :items="property_types"
                            :rules="[v => !!v || 'Item is required']"
                            label="物件種別"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="property.name"
                            :counter="100"
                            label="物件名"
                            required
                        ></v-text-field>

                        <v-select
                            v-model="property.is_pet"
                            :items="is_pet"
                            :rules="[v => !!v || 'Item is required']"
                            label="ペット飼育"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="property.good"
                            :counter="200"
                            label="Goodポイント"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.bad"
                            :counter="200"
                            label="Badポイント"
                        ></v-text-field>

                        <v-select
                            v-model="property.pet_type"
                            :items="pet_types"
                            :rules="[v => !!v || 'Item is required']"
                            label="ペットの種類"
                            required
                        ></v-select>

                        <v-select
                            v-model="property.pet_cnt"
                            :items="pet_cnt"
                            :rules="[v => !!v || 'Item is required']"
                            label="ペットの数"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="property.nearest_station"
                            :count="50"
                            label="最寄駅"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.address"
                            :count="200"
                            label="所在地"
                        ></v-text-field>


                        <v-text-field
                            v-model="property.cost"
                            :count="10"
                            type="number"
                            prefix="¥"
                            label="家賃"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.manage_cost"
                            :count="10"
                            type="number"
                            prefix="¥"
                            label="管理費"
                        ></v-text-field>

                        <v-select
                            v-model="property.deposit"
                            :items="deposit"
                            :rules="[v => !!v || 'Item is required']"
                            label="敷金"
                            required
                        ></v-select>

                        <v-select
                            v-model="property.key_money"
                            :items="key_money"
                            :rules="[v => !!v || 'Item is required']"
                            label="礼金"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="property.area"
                            type="number"
                            label="専有面積"
                            suffix="㎡"
                        ></v-text-field>

                        <v-select
                            v-model="property.floor_plan"
                            :items="floor_plan"
                            :rules="[v => !!v || 'Item is required']"
                            label="間取り"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="property.floor"
                            type="number"
                            label="階数"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.age"
                            type="month"
                            label="築年月"
                        ></v-text-field>

                        <v-select
                            v-model="property.structure"
                            :items="structure"
                            :rules="[v => !!v || 'Item is required']"
                            label="建物構造"
                            required
                        ></v-select>

                        <v-select
                            v-model="property.park"
                            :items="park"
                            :rules="[v => !!v || 'Item is required']"
                            label="駐車場の有無"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="property.facility"
                            :counter="200"
                            label="その他条件"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.start_date"
                            label="掲載開始日"
                            type="date"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.corp"
                            :count="200"
                            label="取扱不動産店"
                        ></v-text-field>

                        <v-btn
                            color="#76c3bf"
                            dark
                            class="mr-4"
                            @click="submit"
                        >
                            物件を登録
                        </v-btn>

                    </v-form>
                </v-content>
            </v-card>
        </div>
    </div>
</template>

<style lang="sass">
    @import "../../../../sass/common/_variable.scss"
    .corp-index
        &__wrap
            position: relative

    .corp-register
        &__image-uploader-wrap
            margin-bottom: 30px

        &__image-uploader-title
            color: rgba(0, 0, 0, 0.6)
            margin-bottom: 10px

</style>

<script>
    import VueUploadMultipleImage from 'vue-upload-multiple-image';

    export default {
        components: {
            VueUploadMultipleImage,
        },
        beforeRouteLeave (to, from, next) {
            const answer = window.confirm("編集中の内容は破棄されます。移動してよろしいですか？");
            if (answer) {
                next();
            } else {
                next(false);
            }
        },
        data() {
            return {
                images: [],
                property: {
                    type: "賃貸",
                    is_pet: "可",
                    images: [],
                },
                types: ["賃貸"],
                property_types: ["マンション","アパート","戸建て","テラスハウス","シェアハウス"],
                pet_types: ["犬", "猫", "犬と猫"],
                pet_cnt: ["1", "2", "3","4","5","上限なし","お問い合わせください"],
                deposit: ["0ヵ月分","1ヶ月分","2ヶ月分","3ヶ月分","4ヶ月分","5ヶ月分","お問い合わせください"],
                key_money: ["0ヵ月分","1ヶ月分","2ヶ月分","3ヶ月分","4ヶ月分","5ヶ月分","お問い合わせください"],
                floor_plan: [
                    "1LDK","1DK","1SLDK","1K","1R",
                    "2LDK","2DK","2SLDK","2K","2R",
                    "3LDK","3DK","3SLDK","3K","3R",
                    "4LDK","4DK","4SLDK","4K","4R",
                    "5LDK","5DK","5SLDK","5K","5R",
                    "6LDK","6DK","6SLDK","6K","6R",
                    "7LDK","7DK","7SLDK","7K","7R",
                ],
                is_pet: ["可"],
                structure: ["木造","鉄骨造","鉄筋コンクリート","鉄骨鉄筋コンクリート","その他"],
                park: ["有","無"],
            }
        },
        methods: {
            submit: function () {
                this.$http
                    .post('/api/add-property', this.property)
                    .then(response => {
                        this.$parent.snack_text = "物件を登録しました";
                        this.$parent.snack_color = "#76c3bf";
                        this.$parent.snackbar = true;
                        this.$refs.form.reset();
                        this.property.images  = [];
                        this.$refs.uploader.images = [];
                    })
                    .catch(error => {
                        this.$parent.snack_text = "エラーが発生しました";
                        this.$parent.snack_color = "warning";
                        this.$parent.snackbar = true;
                    });
            },
            uploadImageSuccess(formData, index, fileList) {
                this.property.images = this.$refs.uploader.images;
            },
        }
    }
</script>
