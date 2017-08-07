<template>
    <div class="admin-main">
        Admin Main
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'admin-main',
        data() {
            return {

            }
        },
        methods: {
            routeLoad() {
                this.$root.$children[0].$emit('restrict-user', 'admin')
            }
        },
        mounted() {
            this.routeLoad()
        },
        watch: {
            '$route' (to, from) {
                this.routeLoad()
            }
        }
    }
</script>
