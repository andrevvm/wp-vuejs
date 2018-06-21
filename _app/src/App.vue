<template>

  <main-layout>  
    <router-view></router-view>
  </main-layout>

</template>

<script>
import MobileDetect from 'mobile-detect'

import MainLayout from '@/layouts/MainLayout'

new MobileDetect(window.navigator.userAgent)

export default {
  name: 'app',
  components: { MainLayout },
  created() {
    var md = new MobileDetect(window.navigator.userAgent);
    this.$store.state.mobile = md.mobile();
  }
}
</script>