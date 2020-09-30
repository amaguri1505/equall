<template>
    <div class="contact">
        <v-overlay
            :value="overlay"
        >
            <v-progress-circular
                indeterminate
                color="#76c3bf"
            ></v-progress-circular>
        </v-overlay>
        <v-form
            ref="form"
            lazy-validation
        >
            <h1 class="contact__title">
                お問い合わせ<br>
                {{ title }}
            </h1>
            <v-checkbox
                label="物件の詳細を知りたい"
                value="物件の詳細を知りたい"
                v-model="inquiry.options"
            ></v-checkbox>
            <v-checkbox
                label="実際に物件を見たい"
                value="実際に物件を見たい"
                v-model="inquiry.options"
            ></v-checkbox>
            <v-checkbox
                label="空室状況を知りたい"
                value="空室状況を知りたい"
                v-model="inquiry.options"
            ></v-checkbox>
            <v-checkbox
                label="その他（フォームにご入力ください）"
                value="その他（フォームにご入力ください）"
                v-model="inquiry.options"
            ></v-checkbox>
            <v-textarea
                v-model="inquiry.contact_text"
                label="お問い合わせ内容"
                class="mt-2"
                filled
                auto-grow
                rows="4"
            ></v-textarea>

            <v-btn
                color="#76c3bf"
                dark
                @click="submit"
            >
                送信
            </v-btn>
        </v-form>
    </div>
</template>

<style lang="sass">
    @import "../../../sass/common/_variable.scss"
    .contact
        margin-top: 48px
        padding: 40px 20px 80px 20px
        text-align: center

        &__title
            font-size: 1.5rem
            color: #666
            margin-bottom: 2rem

</style>

<script>
    export default {
        methods: {
            submit: function () {
                this.overlay = true;
                this.$http
                    .post('/api/add-inquiry', this.inquiry)
                    .then(response => {
                        this.$parent.snack_text = "問い合わせを送信しました";
                        this.$parent.snack_color = "#76c3bf";
                        this.$parent.snackbar = true;
                        this.$refs.form.reset();
                        this.overlay = false;
                    })
                    .catch(error => {
                        this.$parent.snack_text = "エラーが発生しました";
                        this.$parent.snack_color = "warning";
                        this.$parent.snackbar = true;
                        this.overlay = false;
                    });
            }
        },
        created() {
            const detail_id = this.$route.params.detail_id;
            this.inquiry.property_id = detail_id;
            this.$http
                .get(`/api/get-title/${detail_id}`)
                .then(response => {
                    this.title = response.data[0].name;
                    this.$parent.overlay = false;
                });
        },
        data() {
            return {
                title: "",
                overlay: false,
                inquiry: {
                    options: [],
                    property_id: 0,
                },
                test: [],
            }
        },
    }
</script>
