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
        created() {
            this.$parent.$emit('restrict-user', 'manager')
        },
        mounted() {
            
        }
    }
</script>
