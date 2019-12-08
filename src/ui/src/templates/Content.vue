<template>
  <transition name="fade" mode="out-in">
    <router-view></router-view>
  </transition>
</template>
<script>
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters({
      authStatus: "getLoggedInStatus"
    })
  },
  created() {
    if (!this.authStatus) {
      this.$router.push({ name: "Login" });
    }
  }
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.1s;
}

.fade-enter,
    .fade-leave-to
        /* .fade-leave-active in <2.1.8 */

 {
  opacity: 0;
}
.help-button {
  /*position: fixed !important;*/
  margin-bottom: 100px;
}
</style>
