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
    slug:{}

    },

    actions: {
        getArticleData(context, payload) {
            axios.get('/api/article-json' , {params:{slug:payload}}).then((response) =>{
                context.commit('SET_ARTICLE', response.data.article_data)
            }).catch(()=>{
                console.log('Ошибка')
            });
        },
        // getArticleData(context,payload){
        //
        //     console.log('context:', context);
        //     console.log('payload:', payload);
        //
        //     console.log('action - getArticleData');
        //     console.log('axios - StartGettingData....');
        //
        //     axios.get('/api/article-json',{params:{slug: payload}}).then((response)=> {
        //         context.commit('SET_ARTICLE', response.data.data);
        //         console.log('axios - DataReceived....');
        //         console.log( response.data.data);
        //     }).catch(()=>{
        //         console.log('Error');
        //     });
        // }
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
