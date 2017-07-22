<template>
    <div class="main">
        Regular Main
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
            this.$parent.$emit('restrict-user', 'regular')
        },
        mounted() {

        }
    }
</script>
