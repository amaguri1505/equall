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
                {{ title }}へのお問い合わせ
            </h1>
            <v-textarea
                label="お問い合わせ内容"
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
        },
        created() {
            const detail_id = this.$route.params.detail_id;
            this.$http
                .get(`/get-title/${detail_id}`)
                .then(response => {
                    // this.title = JSON.parse(response.data).name;
                    this.title = response.data[0].name;
                    this.overlay = false;
                });
        },
        data() {
            return {
                title: "",
                overlay: true,
            }
        }
    }
</script>
