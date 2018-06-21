<template>
  <div v-if="$store.state.page" id="container" class="container">
    
    <transition name="fade">
      <div ref="layout" class="layout">
        <slot></slot>
      </div>
    </transition>

  </div>
</template>

<style lang="scss">
  @import "~styles/variables";
</style>

<script>

  export default {

    components: {
      
    },

    data: function() {
      return {
        
      }
    },

    mounted() {
      this.init()
    },

    methods: {
      init() {
        
      }
    },
  }
</script>