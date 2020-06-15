<template>
    <div class="sidebar__wrap">
        <v-list class="sidebar__list" flat>
            <v-list-item-group>
                <v-list-item
                    v-for="(item, i) in items"
                    :key="i"
                    :to="item.to"
                >
                    <v-list-item-icon>
                        <v-icon v-text="item.icon">
                        </v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title v-text="item.text">
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list-item-group>
        </v-list>
    </div>
</template>
<style lang="sass">
    .sidebar
        &__wrap
            height: 100%
            background-color: white

        &__list
            v-list-item
                padding-left: 20px

</style>
<script>
    export default {
        data: () => ({
            item: 1,
            items: [
                {text: '物件管理', icon: 'mdi-home-city-outline', to: '/corp/manage-property'},
                {text: '物件登録', icon: 'mdi-home-variant-outline', to: '/corp/register-property'},
                {text: '問い合わせ管理', icon: 'mdi-email-outline', to: '/corp/manage-inquiry'},
                {text: 'アカウント情報', icon: 'mdi-card-account-mail-outline', to: '/corp/manage-account-info'},
            ]
        })
    }
</script>
