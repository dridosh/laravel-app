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
            console.log(context);
            console.log(payload);
            console.log("rootState.slug", context.rootState.slug)
            console.log("rootGetters.articleSlugRevers", context.rootGetters.articleSlugRevers)
            setTimeout(() => {
                axios.put('/api/article-views-increment',  {slug:payload }).then((response) =>{
                // axios.put('/api/article-views-increment',  {params:{slug:payload}}).then((response) =>{ !!! ОШИБКА !!! params:
                    context.commit('SET_ARTICLE', response.data.article_data)
                    console.log( response.data.article_data)
                }).catch(()=>{
                    console.log('Ошибка')
                });
            }, 5000)
        },

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
        }

    }
})
