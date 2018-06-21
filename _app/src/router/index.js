import Vue from 'vue'
import Router from 'vue-router'
import {HTTP} from '@/http/http-common'

Vue.use(Router)

//const RouterTemplate = () => import('@/pages/Router.vue')
import RouterTemplate from '@/pages/Router.vue'

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/:type?/:single?',
      name: 'Type',
      props: true,
      component: RouterTemplate
    }
  ]
})

export default router
