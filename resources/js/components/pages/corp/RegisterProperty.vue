<template>
    <div class="corp-index pa-2">
        <div class="corp-index__wrap">
            <v-card
                class="pa-5"
            >
                <v-content>
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                    >
                        <div class="corp-register__image-uploader-wrap">
                            <div class="corp-register__image-uploader-title">
                                不動産の画像
                            </div>
                            <vue-upload-multiple-image
                                :data-images="images"
                                idUpload="myIdUpload"
                                editUpload="myIdEdit"
                                dragText="ここに画像をドラッグ"
                                browseText="画像を選択"
                            ></vue-upload-multiple-image>
                        </div>

                        <v-select
                            v-model="property.type"
                            :items="types"
                            :rules="[v => !!v || 'Item is required']"
                            label="種類"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="property.name"
                            :counter="100"
                            label="物件名"
                            required
                        ></v-text-field>

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

                        <v-text-field
                            v-model="property.pet_cnt"
                            type="number"
                            :count="20"
                            label="ペット数"
                        ></v-text-field>

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

                        <v-select
                            v-model="property.is_pet"
                            :items="is_pet"
                            :rules="[v => !!v || 'Item is required']"
                            label="ペット飼育可能か"
                            required
                        ></v-select>

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

                        <v-text-field
                            v-model="property.initial_cost"
                            :count="10"
                            type="number"
                            prefix="¥"
                            label="初期費用"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.area"
                            type="number"
                            label="専有面積"
                            suffix="㎡"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.floor_plan"
                            :count="10"
                            label="間取り"
                        ></v-text-field>

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

                        <v-text-field
                            v-model="property.structure"
                            :count="30"
                            label="建物構造"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.park"
                            :count="30"
                            label="駐車場の有無"
                        ></v-text-field>

                        <v-text-field
                            v-model="property.facility"
                            :count="200"
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
        data() {
            return {
                property: {},
                images: [],
                types: ["賃貸"],
                pet_types: ["猫", "犬", "犬猫両方可能"],
                is_pet: ["可能"],
            }
        },
        methods: {
            submit: function () {
                this.$http
                    .post('/add-property', this.property)
                    .then(response => {
                        this.$parent.snack_text = "物件を登録しました";
                        this.$parent.snack_color = "#76c3bf";
                        this.$parent.snackbar = true;
                    })
                    .catch(error => {
                        this.$parent.snack_text = "エラーが発生しました";
                        this.$parent.snack_color = "warning";
                        this.$parent.snackbar = true;
                    });
            }
        }
    }
</script>
