<template>
    <v-text-field
        class="mt-5"
        background-color="white"
        single-line
        outlined
        placeholder="メールで始める"
        v-model="email"
        :rules="[rules.required, rules.email]"
    >
        <template v-slot:append>
            <v-btn
                depressed
                tile
                x-large
                dark
                color="#f09299"
                class="ma-0">
                登録
            </v-btn>
        </template>
    </v-text-field>
</template>
<script>
    export default {
        methods: {
            search: function (event) {
                this.$router.push("/result");
            }
        }
    }
</script>
