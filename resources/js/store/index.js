import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        article: {
            comments: [],
            tags: [],
            statistic: {
                likes: 0,
                views: 0
            }
        },
        slug: "",
        likeIt: true,
        commentSuccess: false,
        errors:[],
    },

    actions: {
        getArticleData(context, payload) {
            axios.get('/api/article-json', {params: {slug: payload}}).then((response) => {
                context.commit('SET_ARTICLE', response.data.article_data)
            }).catch(() => {
                console.log('Ошибка')
            });
        },
        viewsIncrement(context, payload) {
            setTimeout(() => {
                axios.put('/api/article-views-increment', {slug: payload}).then((response) => {
                    // axios.put('/api/article-views-increment',  {params:{slug:payload}}).then((response) =>{ !!! ОШИБКА !!! params:
                    context.commit('SET_ARTICLE', response.data.article_data)
                }).catch(() => {
                    console.log('Ошибка')
                });
            }, 5000)
        },

        addLike(context, payload) {
            axios.put('/api/article-likes-increment', {
                slug: payload.slug,
                increment: payload.increment
            }).then((response) => {
                context.commit('SET_ARTICLE', response.data.article_data);
                context.commit('SET_LIKE', !this.state.likeIt);
            }).catch(() => {
                console.log('Ошибка addLike')
            });
        },

        addComment(context, payload){
            axios.post('/api/article-add-comment',{
                subject:payload.subject,
                body:payload.body,
                article_id:payload.article_id
            }).then(()=>{
                context.commit('SET_COMMENT_SUCCESS',!context.state.commentSuccess);
                context.dispatch('getArticleData',context.state.slug);
            }).catch((error)=>{
                if (error.response.status===422){
                    context.state.errors =error.response.data.errors;
                    console.log(1, error.response.data.errors);
                    console.log(2, error);
                    console.log(3, error.response);
                    console.log(4, error.response.data);

                }
                console.log('Ошибка передачи комментария на сервер');
            });
        }

    },

    getters: {

        articleViews(state) {
            return state.article.statistic.views;
        },

        articleLikes(state) {
            return state.article.statistic.likes;
        }
    },

    mutations: {
        SET_ARTICLE(state, payload) {
            return state.article = payload;
        },
        SET_SLUG(state, payload) {
            return state.slug = payload;
        },
        SET_LIKE(state, payload) {
            return state.likeIt = payload;
        },
        SET_COMMENT_SUCCESS(state, payload) {
            return state.commentSuccess = payload;
        }


    }
})
