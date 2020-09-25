<template>
    <div class="equall-terms__dialog-wrap">
        <v-dialog
            v-model="dialog"
            width="500"
        >
            <template v-slot:activator="{ on }">
                <v-btn
                    color="white"
                    outlined
                    v-on="on"
                >
                    利用規約
                </v-btn>
            </template>

            <v-card>
                <v-card-title
                    class="headline grey lighten-2"
                    primary-title
                >
                    利用規約
                    <v-spacer></v-spacer>
                    <v-btn icon @click="dialog=false">
                        <v-icon>
                            mdi-close
                        </v-icon>
                    </v-btn>
                </v-card-title>

                <v-card-text>
                    <terms></terms>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="dialog = false"
                    >
                        OK
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<style lang="sass">
    .equall-terms
        &__dialog-wrap
            text-align: center
</style>
<script>
    import Terms from "../organism/Terms";

    export default {
        components: {
            Terms,
        },
        data() {
            return {
                dialog: false,
            }
        }
    }
</script>
