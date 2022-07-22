<template>
<div class="comments">
    <h2>привет я коммент компонент  - очень --</h2>
    <div class="row">
        <form @submit.prevent="submit_form()">
            <div class="mb-3">
                <label for="commentSubject" class="form-label">Тема комментария</label>
                <input type="text" class="form-control" id="commentSubject" v-model="subject">
            </div>
            <div class="mb-3">
                <label for="commentBody" class="form-label">Комментарий</label>
                <textarea class="form-control" name="" id="commentBody" rows="3" v-model="body"></textarea>
            </div>
            <button class="btn btn-success" type="submit"> Отправить</button>
        </form>

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
        comments () {
            return this.$store.state.article.comments;
        }
    },

    methods: {
        submit_form(){
            console.log("submit_form",'\n',
                          this.subject, '\n',
                          this.body, '\n',
                          this.$store.state.article.id)
        }
    }

}
</script>

<style scoped>

</style>
