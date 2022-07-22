import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        article: {
            comments:[],
            tags: [],
            statistic:{
                likes: 0,
                views: 0
            }
        },
        slug: "",
        likeIt: true,
    },

    actions: {
        getArticleData(context, payload) {
            axios.get('/api/article-json' , {params:{slug:payload}}).then((response) =>{
                context.commit('SET_ARTICLE', response.data.article_data)
            }).catch(()=>{
                console.log('Ошибка')
            });
        },
        viewsIncrement(context, payload){
            setTimeout(() => {
                axios.put('/api/article-views-increment',  {slug:payload }).then((response) =>{
                // axios.put('/api/article-views-increment',  {params:{slug:payload}}).then((response) =>{ !!! ОШИБКА !!! params:
                    context.commit('SET_ARTICLE', response.data.article_data)
                 }).catch(()=>{
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
       }

        },

    getters: {

        articleViews(state){
               return state.article.statistic.views;
        },

        articleLikes(state){
                 return state.article.statistic.likes;
        }
    },

    mutations: {
        SET_ARTICLE(state, payload){
            return  state.article=payload;
        },
       SET_SLUG(state, payload){
            return  state.slug=payload;
        },
        SET_LIKE(state, payload) {
            return state.likeIt = payload;
        },


    }
})
