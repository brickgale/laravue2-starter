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
        created() {
            this.$parent.$emit('restrict-user', 'regular')
        },
        mounted() {

        }
    }
</script>
