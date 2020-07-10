<template>
    <div class="relationship">
        <div class="relationship__wrap">
            <div class="relationship__title">
                <v-icon color="#76c3bf">mdi-handshake</v-icon>
                物件提携希望の方
            </div>
            <v-divider></v-divider>
            <div class="relationship__content pt-5">

                <v-select
                    v-model="relationship.contact_detail"
                    :items="contact_detail"
                    :rules="[v => !!v || 'Item is required']"
                    label="お問い合わせ内容"
                    required
                ></v-select>

                <v-text-field
                    v-model="relationship.corp_name"
                    :count="100"
                    label="法人名"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="relationship.person_name"
                    :count="100"
                    label="担当者名"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="relationship.email"
                    :count="100"
                    label="メールアドレス"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="relationship.contact_text"
                    :count="100"
                    label="電話番号"
                ></v-text-field>

                <v-textarea
                    label="お問い合わせ"
                    filled
                    auto-grow
                    rows="4"
                    required
                ></v-textarea>

                <v-btn
                    color="#76c3bf"
                    dark
                    class="mr-4"
                    @click="submit"
                >
                    送信
                </v-btn>
            </div>
        </div>
    </div>
</template>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .relationship
        &__wrap
            margin-top: 48px
            padding: 40px 20px 80px 20px

        &__title
            color: colors(primary)
            text-align: center
            letter-spacing: 0.2rem
            font-size: 1.5rem

        &__content
            text-align: center
</style>
<script>
    export default {
        data() {
            return {
                relationship: [],
                contact_detail: [
                    "1. 物件掲載に関して",
                    "2. 広告掲載に関して",
                    "3. タイアップに関して",
                    "4. その他",
                ],
            }
        },
        methods: {
            submit() {
                this.$http
                    .post('/submit-relationship', this.relationship)
                    .then(response => {
                        this.$parent.snack_text = "お問い合わせを送信しました";
                        this.$parent.snack_color = "#76c3bf";
                        this.$parent.snackbar = true;
                        this.$refs.form.reset();
                    })
                    .catch(error => {
                        this.$parent.snack_text = "エラーが発生しました";
                        this.$parent.snack_color = "warning";
                        this.$parent.snackbar = true;
                    });
            },
        }
    }
</script>
