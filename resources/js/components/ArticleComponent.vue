<template>
    <div class="row mt-5">
        <div class="col-12 pb-5">
            <img :src="article.img" class="border rounded mx-auto d-block" alt="...">
            <h5 class="mt-5">{{ article.title }}</h5>
            <p>
              <span class="tag" v-for="(tag,index) in article.tags">
                <span v-if="index+1 === tagsLen "> {{ tag.label }}</span>
                <span v-else>{{tag.label}} | </span>
              </span>
            </p>
            <p class="card-text">{{ article.body }}</p>
            <p>Опубликовано: <i>{{ article.created_at }}</i></p>
            <div class="mt-3">
                <span class="badge bg-primary">{{ likes }} <i class="far fa-thumbs-up"></i></span>
                <span class="badge bg-danger">{{ views }} <i class="far fa-eye"></i></span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ArticleComponent" ,
     computed: {
        article() {
            return this.$store.state.article;
        },
        tagsLen() {
            return this.$store.state.article.tags.length;
        },

        views() {
            return this.$store.getters.articleViews;
        },

        likes() {
            return this.$store.getters.articleLikes;
        }


    },
}
</script>

<style scoped>

</style>
