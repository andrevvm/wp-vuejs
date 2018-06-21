import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
const store = new Vuex.Store({
  state: {
    mobile: false,
    pages: [],
    page: null,
    loading: true,
    //ACF options data
    options: null
  },
  actions: {

    currentData: function({commit}, payload) {

      commit('SET_PAGES', payload)
      
    }

  },
  mutations: {

    SET_PAGES: (state, data) => {
      if(data.posts) {
        state.pages = data.posts
        state.page = data.posts[0]
        state.loading = false
      }
      
      state.options = data.options
    },

  },
  getters: {
    currentPage: state => state.page
  }
})
export default store