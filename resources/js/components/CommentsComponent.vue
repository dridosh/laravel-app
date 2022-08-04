<template>
<div class="comments">
    <h2>привет я коммент компонент  - очень --</h2>
    <div class="row">
        <form @submit.prevent="submit_form()" v-if="!commentSuccess" >
            <div class="mb-3">
                <label for="commentSubject" class="form-label">Тема комментария</label>
                <input type="text" class="form-control" id="commentSubject" v-model="subject">
                <div class="alert alert-warning" role="alert"  v-if="errorMessage.subject"> {{errorMessage.subject[0]}} </div>
            </div>
            <div class="mb-3">
                <label for="commentBody" class="form-label">Комментарий</label>
                <textarea class="form-control" name="" id="commentBody" rows="3" v-model="body"></textarea>
                <div class="alert alert-warning" role="alert"  v-if="errorMessage.body"> {{errorMessage.body[0]}} </div>
            </div>
            <button class="btn btn-success" type="submit"> Отправить</button>
        </form>
        <div class="alert alert-success" role="alert"  v-else>
            Комментарий успешно отправлен!
        </div>

        <div v-for="comment in comments" class="toast-container pb-2 mt-5 mx-auto" style="min-width: 100%;">
            <div class="toast show" style="min-width: 100%;">
                <div class="toast-header">
                    <img src="https://via.placeholder.com/50/5F113B/FFFFFF/?text=User" class="rounded me-2"
                         alt="...">
                    <strong class="me-auto">{{comment.subject}}</strong>
                    <small class="text-muted">{{comment.created_at}}</small>
                </div>
                <div class="toast-body">
                    {{comment.body}}
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "CommentsComponent",
    data(){
        return {
            subject: '',
            body: ''
        }

    },

    computed: {
        commentSuccess(){
            return this.$store.state.commentSuccess;
        },
        comments () {
            return this.$store.state.article.comments;
        },
        errorMessage(){
            return this.$store.state.errors;
        }


    },

    methods: {
        submit_form(){
            this.$store.dispatch('addComment',{
                subject: this.subject,
                body: this.body,
                article_id: this.$store.state.article.id,
            })
        }
    }

}
</script>

<style scoped>

</style>
