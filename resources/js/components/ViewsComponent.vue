<template>
    <span class="badge bg-danger">{{viewsNumber}}<i class="far fa-eye"></i></span>
</template>

<script>
export default {
    computed: {
        viewsNumber() {
            return this.$store.getters.articleViews;
        }
    },
    mounted() {
        console.log('Component Views mounted.')
    }
}
</script>

<style scoped>

</style>
