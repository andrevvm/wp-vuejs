<template>
  <page-container>
    <template v-for="page in $store.state.pages">
      <router-link :to="page.link"><h1 v-html="page.post_title"></h1></router-link>
      <p>Custom post type template</p>
    </template>
  </page-container>
</template>

<script>
  import PageContainer from '@/components/PageContainer'

  export default {
    components: {
      PageContainer
    },

    data: function() {
      return {

      }
    },

    destroyed() {

    },

    created() {

      
    },

    methods: {

    },

    mounted() {
      
    }
  }
</script>

<style lang="scss">
  @import "~styles/variables";

</style>