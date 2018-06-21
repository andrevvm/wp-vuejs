<template>
  
  <component v-if="$store.state.page" v-bind:is="currentPage" :key="$store.state.page.post_name"></component>

</template>

<script>

  import {reqUrl, HTTP} from '@/http/http-common'

  export default {

    props: ['type', 'single'],

    data: function() {
      return {
        
      }
    },

    created() {

      this.fetchData(window.location.pathname)
      
    },

    beforeRouteUpdate (to, from, next) {
      next()
      this.fetchData(to.path)
    },

    methods: {
      fetchData(urlPath) {

        const $vm = this
        var url = reqUrl(urlPath)

        HTTP.get(url)
          .then(response => {

            var currentTitleTag = document.title

            $vm.$store.dispatch('currentData', response.data.result)
            if($vm.$store.state.page.post_type in this.$options.components) {
              $vm.currentPage = $vm.$store.state.page.post_type
            } else {
              $vm.currentPage = 'DefaultPage'
            }

            document.title = $vm.$store.state.page.post_title + ' – ' + currentTitleTag.split('–')[1]
            
          })
          .catch(e => {
            $vm.$store.state.page = 'Error404'
            $vm.currentPage = 'Error404'
            console.log('error!! '+e)
          })

      }
    },

  }

</script>