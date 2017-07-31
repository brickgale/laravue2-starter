<template>
    <div class="app-container">
        <ui-toolbar title="App" :removeNavIcon="remove_nav_icon">
            <div slot="actions" class="nav-buttons">
                <router-link to="/">
                    <ui-button 
                        class="signin" raised color="primary" type="secondary" size="small">
                            Sign-in
                    </ui-button>
                </router-link>
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
                    if(this.auth.user.role != role) {
                        router.push({ name: 'home' })
                    }

                    if(this.auth.user.role) {
                        router.push({ name: this.auth.user.role })
                    }
                }
                auth.check(role, cb)
            }
        }
    }
</script>
