<template>
    <div class="main">
        Admin Main
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'main',
        data() {
            return {

            }
        },
        created() {
            this.$parent.$emit('restrict-user', 'admin')
        },
        mounted() {

        }
    }
</script>
