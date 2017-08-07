<template>
    <div class="regular-main">
        Regular Main
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'regular-main',
        data() {
            return {

            }
        },
        methods: {
            routeLoad() {
                this.$root.$children[0].$emit('restrict-user', 'regular')
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
