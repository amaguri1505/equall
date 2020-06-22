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
                            v-model="type"
                            :items="types"
                            :rules="[v => !!v || 'Item is required']"
                            label="種類"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="name"
                            :counter="100"
                            :rules="nameRules"
                            label="物件名"
                            required
                        ></v-text-field>

                        <v-text-field
                            v-model="good"
                            :counter="200"
                            :rules="goodRules"
                            label="Goodポイント"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :counter="200"
                            :rules="badRules"
                            label="Badポイント"
                        ></v-text-field>

                        <v-select
                            v-model="pet_type"
                            :items="pet_types"
                            :rules="[v => !!v || 'Item is required']"
                            label="ペットの種類"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="bad"
                            type="number"
                            :count="20"
                            :rules="badRules"
                            label="ペット数"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="50"
                            :rules="badRules"
                            label="最寄駅"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="200"
                            :rules="badRules"
                            label="所在地"
                        ></v-text-field>

                        <v-select
                            v-model="is_pet"
                            :items="is_pet"
                            :rules="[v => !!v || 'Item is required']"
                            label="ペット飼育可能か"
                            required
                        ></v-select>

                        <v-text-field
                            v-model="bad"
                            :count="10"
                            :rules="badRules"
                            type="number"
                            prefix="¥"
                            label="家賃"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="10"
                            :rules="badRules"
                            type="number"
                            prefix="¥"
                            label="管理費"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="10"
                            :rules="badRules"
                            type="number"
                            prefix="¥"
                            label="初期費用"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :rules="badRules"
                            type="number"
                            label="専有面積"
                            suffix="㎡"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="10"
                            :rules="badRules"
                            label="間取り"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :rules="badRules"
                            type="number"
                            label="階数"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :rules="badRules"
                            type="month"
                            label="築年月"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="30"
                            :rules="badRules"
                            label="建物構造"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="30"
                            :rules="badRules"
                            label="駐車場の有無"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="200"
                            :rules="badRules"
                            label="その他条件"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :rules="badRules"
                            label="掲載開始日"
                            type="date"
                        ></v-text-field>

                        <v-text-field
                            v-model="bad"
                            :count="200"
                            :rules="badRules"
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
                images: [],
                types: ["賃貸"],
                pet_types: ["猫", "犬", "犬猫両方可能"],
                is_pet: ["可能"],
            }
        },
        method: {
            submit() {

            }
        }

    }
</script>
