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
        created() {
            this.$parent.$emit('restrict-user', 'admin')
        },
        mounted() {

        }
    }
</script>
