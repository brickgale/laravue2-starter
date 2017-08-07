<template>
    <div class="manager-main">
        Manager Main
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'manager-main',
        data() {
            return {

            }
        },
        methods: {
            routeLoad() {
                this.$root.$children[0].$emit('restrict-user', 'manager')
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
