<template>
    <span @click="addLike()" class="badge likesButton" :class="isLike ? 'bg-primary': 'bg-danger'">{{ articleLikes }} <i class="far fa-thumbs-up"></i></span>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    computed: {
        isLike(){
            return this.$store.state.likeIt;
        },
        articleLikes(){
            return this.$store.state.article.statistic.likes;
        }

       // ...mapGetters('', ['articleLikes']),
    },
    methods: {
        addLike(){
            this.$store.dispatch('addLike', {
                slug : this.$store.state.slug,
                increment: this.isLike
            })
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>

.likesButton {
    cursor: pointer;
}

</style>
