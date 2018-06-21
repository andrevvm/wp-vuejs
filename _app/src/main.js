//Fetch polyfill for older Safari
import 'whatwg-fetch'

import Vue from 'vue'
import App from '@/App'
import { sync } from 'vuex-router-sync'
import router from '@/router'
import store from '@/store'

import {reqUrl, HTTP} from '@/http/http-common'

//Automatic pages import
import '@/pages/_pages'

sync(store, router)

initApp();

function initApp() {

  new Vue({
    el: '#app',
    router,
    store,
    template: '<App/>',
    components: { App }
  })

}
