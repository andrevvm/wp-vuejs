//Fetch polyfill for older Safari
import 'whatwg-fetch'

// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import { sync } from 'vuex-router-sync'
import router from './router'
import store from './store'

import {reqUrl, HTTP} from '@/http/http-common'

sync(store, router)

Vue.config.productionTip = false

initApp();

function initApp() {

  Vue.component('404', () => import('@/pages/404.vue'))
  Vue.component('page', () => import('@/pages/page/page.vue'))
  Vue.component('post', () => import('@/pages/post/post.vue'))
  Vue.component('custom', () => import('@/pages/custom_example/custom.vue'))

  new Vue({
    el: '#app',
    router,
    store,
    template: '<App/>',
    components: { App }
  })

}
