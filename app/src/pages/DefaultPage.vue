<template>
  <page-container>
    <h1 v-html="$store.state.page.post_title"></h1>
    <div class="page" v-html="$store.state.page.post_content"></div>
  </page-container>
</template>

<style lang="scss">
  
</style>

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

    mounted() {
      
    }
  }
</script>