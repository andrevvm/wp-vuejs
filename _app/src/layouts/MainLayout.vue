<template>

  <main ref="main" :class="pageLoading">

    <slot></slot>

  </main>

</template>

<style lang="scss">
  @import "~styles/main.scss";
  @import "~styles/variables";
  @import "~styles/admin-bar";
</style>

<script>

  export default {

    components: {
      
    },

    data: function() {
      return {
        
      }
    },

    watch: {
      '$route' (to, from) {
        this.$nextTick(this.init)        
      }
    },

    computed: {

      pageLoading() {
        if(this.$store.state.loading) {
          return 'loading'
        } else {
          return ''
        }
      }

    },

    mounted() {
      this.init()
    },

    methods: {
      init() {
        
      },
    }

  }
</script>