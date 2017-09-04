<template>
    <div class="app-container">
        <ui-toolbar title="App" :removeNavIcon="remove_nav_icon">
            <div slot="actions" class="nav-buttons">
                <router-link to="/" v-if="!auth.user.authenticated">
                    <ui-button 
                        class="signin" raised color="primary" type="secondary" size="small">
                            Sign-in
                    </ui-button>
                </router-link>
                <ui-button v-if="auth.user.authenticated" @click="auth.signout()"
                    class="signin" raised color="primary" type="secondary" size="small">
                        Sign-out
                </ui-button>
            </div>
        </ui-toolbar>
        <div class="main-content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import auth from '../services/auth'
    import router from '../routes'

    export default {
        name: 'app',
        data() {
            return {
                auth,
                remove_nav_icon: true
            }
        },
        created() {
            this.$on('restrict-user', this.handleRestrict)
        },
        beforeDestroy() {
            this.$off('restrict-user', this.handleRestrict)
        },
        mounted() {

        },
        methods: {
            handleRestrict(role) {
                let cb = () => {
                    if(this.auth.user.role != role && role != 'guest') {
                        router.push({ name: 'home' })
                    }
                }
                auth.check(role, cb)
            }
        }
    }
</script>
