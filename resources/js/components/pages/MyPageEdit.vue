<template>
    <div class="mypage-edit">
        <v-form
            class="mypage-edit__form"
            ref="form"
        >
            <equall-logo class="mypage-edit__logo"/>
            <equall-start
                title="あなたのお名前を教えてください"
                class="mt-5"
            />
            <v-container
                class="mypage-edit__container"
            >
                <v-row>
                    <v-col
                        cols="6"
                    >
                        <v-text-field
                            v-model="equall_user.family_name"
                            color="white"
                            dark
                            :counter="30"
                            :rules="rule_limit30"
                            label="姓"
                        ></v-text-field>
                    </v-col>
                    <v-col
                        cols="6"
                    >
                        <v-text-field
                            v-model="equall_user.first_name"
                            color="white"
                            dark
                            :counter="30"
                            :rules="rule_limit30"
                            label="名"
                        ></v-text-field>
                    </v-col>
                </v-row>
            </v-container>
            <equall-start
                title="メールアドレスを教えてください"
                class="mt-5"
            />
            <v-container
                class="mypage-edit__container"
            >
                <v-row>
                    <v-col
                        cols="12"
                    >
                        <v-text-field
                            v-model="equall_user.email"
                            color="white"
                            dark
                            :rules="rule_email"
                            label="メールアドレス"
                        ></v-text-field>
                    </v-col>
                </v-row>
            </v-container>
            <equall-start
                title="新しいパスワードを教えてください"
                class="mt-5"
            />
            <v-container
                class="mypage-edit__container"
            >
                <v-row>
                    <v-col
                        cols="12"
                    >
                        <v-text-field
                            v-model="equall_user.new_password"
                            color="white"
                            dark
                            type="password"
                            :rules="rule_password"
                            label="パスワード"
                        ></v-text-field>
                    </v-col>
                </v-row>
            </v-container>
            <equall-start
                title="あなたの性別を教えてください"
                class="mt-5"
            />
            <v-container
                class="mypage-edit__container"
            >
                <v-row>
                    <v-col
                        cols="12"
                    >
                        <v-radio-group
                            v-model="equall_user.gender"
                            row
                            class="mypage-edit__gender"
                        >
                            <v-radio
                                label="男性"
                                value="男性"
                                dark
                                color="#f09299"
                                class="mypage-edit__radio--left"
                            ></v-radio>
                            <v-radio
                                label="女性"
                                value="女性"
                                dark
                                color="#f09299"
                                class="mypage-edit__radio--right"
                            ></v-radio>
                        </v-radio-group>
                    </v-col>
                </v-row>
            </v-container>
            <equall-start
                title="ペットを飼っていますか？"
                class="mt-5"
            />
            <v-container
                class="mypage-edit__container"
            >
                <v-row>
                    <v-col
                        cols="12"
                    >
                        <v-radio-group
                            v-model="equall_user.is_pet_owner"
                            row
                            class="mypage-edit__gender"
                        >
                            <v-radio
                                label="はい"
                                value="はい"
                                dark
                                color="#f09299"
                                class="mypage-edit__radio--left"
                            ></v-radio>
                            <v-radio
                                label="いいえ"
                                value="いいえ"
                                dark
                                color="#f09299"
                                class="mypage-edit__radio--right"
                            ></v-radio>
                        </v-radio-group>
                    </v-col>
                </v-row>
            </v-container>
            <v-container
                class="mypage-edit__pet-type-container"
            >
                <v-row
                    align="center"
                    justify="center"
                >
                    <v-col
                        cols="4"
                    >
                        猫
                    </v-col>
                    <v-col
                        cols="4"
                    >
                        <v-select
                            v-model="equall_user.num_cat"
                            color="white"
                            dark
                            :items="num_of_pets"
                        ></v-select>
                    </v-col>
                    <v-col
                        cols="4"
                    >
                        頭
                    </v-col>
                </v-row>
                <v-row
                    align="center"
                    justify="center"
                >
                    <v-col
                        cols="4"
                    >
                        大型犬
                    </v-col>
                    <v-col
                        cols="4"
                    >
                        <v-select
                            v-model="equall_user.num_large_dog"
                            color="white"
                            dark
                            :items="num_of_pets"
                        ></v-select>
                    </v-col>
                    <v-col
                        cols="4"
                    >
                        頭
                    </v-col>
                </v-row>
                <v-row
                    align="center"
                    justify="center"
                >
                    <v-col
                        cols="4"
                    >
                        中型犬
                    </v-col>
                    <v-col
                        cols="4"
                    >

                        <v-select
                            v-model="equall_user.num_middle_dog"
                            color="white"
                            dark
                            :items="num_of_pets"
                        ></v-select>
                    </v-col>
                    <v-col
                        cols="4"
                    >
                        頭
                    </v-col>
                </v-row>
                <v-row
                    align="center"
                    justify="center"
                >
                    <v-col
                        cols="4"
                    >
                        小型犬
                    </v-col>
                    <v-col
                        cols="4"
                    >
                        <v-select
                            v-model="equall_user.num_small_dog"
                            color="white"
                            dark
                            :items="num_of_pets"
                        ></v-select>

                    </v-col>
                    <v-col
                        cols="4"
                    >
                        頭
                    </v-col>
                </v-row>
                <v-row
                    align="center"
                    justify="center"
                >
                    <v-col
                        cols="4"
                    >
                        その他
                    </v-col>
                    <v-col
                        cols="4"
                    >
                        <v-select
                            v-model="equall_user.num_other"
                            color="white"
                            dark
                            :items="num_of_pets"
                        ></v-select>

                    </v-col>
                    <v-col
                        cols="4"
                    >
                    </v-col>
                </v-row>
            </v-container>
            <equall-start
                title="希望の条件を教えてください"
                class="mt-5"
            />
            <v-container
                class="mypage-edit__container"
            >
                <v-row>
                    <v-col
                        cols="12"
                    >
                    <v-text-field
                        v-model="equall_user.cond_nearest_station"
                        color="white"
                        dark
                        :counter="30"
                        :rules="rule_limit30"
                        label="最寄駅"
                    ></v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                    >
                        <v-text-field
                            v-model="equall_user.cond_area"
                            color="white"
                            dark
                            :counter="30"
                            :rules="rule_limit30"
                            label="エリア"
                        ></v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                    >
                        <v-text-field
                            v-model="equall_user.cond_limit_cost"
                            color="white"
                            dark
                            :counter="30"
                            :rules="rule_limit30"
                            label="家賃上限"
                        ></v-text-field>
                    </v-col>
                </v-row>
            </v-container>
            <v-btn
                color="#f09299"
                dark
                x-large
                class="mt-5 mx-auto"
                @click="submit"
            >
                登録
            </v-btn>
        </v-form>
    </div>
</template>
<script>
    import EquallLogo from "../atom/EquallLogo";
    import EquallStart from "../atom/EquallStart";
    import {mapState, mapActions} from "vuex";

    export default {
        components: {
            EquallLogo,
            EquallStart,
        },
        computed: mapState({
            equall_user: state => state.auth.user,
        }),
        data() {
            return {
                num_of_pets: [
                    "0",
                    "1",
                    "2",
                    "3",
                    "4",
                    "5",
                    "それ以上",
                ],
            }
        },
        methods: {
            ...mapActions({
                update: 'auth/updateUser',
            }),
            submit() {
                this.update();
            }
        },
    }

</script>
<style lang="sass">
    @import "../../../sass/common/_variable.scss"

    .mypage-edit
        margin-top: 48px
        padding: 40px 20px 80px 20px
        background-color: colors(primary)

        &__form
            text-align: center

        &__radio
            &--left
                margin-left: auto !important
                margin-right: 20px !important

            &--right
                margin-left: 20px !important
                margin-right: auto !important

        &__container
            padding-left: 50px
            padding-right: 50px

        &__pet-type-container
            color: white
            background-color: #badde6
            border-radius: 10px
            padding: 20px 50px

</style>
