<template>
  <div id="q-app">
    <div class="wrapper">
      <div class="main-panel">
        <top-navbar></top-navbar>

        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import TopNavbar from "./TopNavbar.vue";
import DashboardContent from "./Content.vue";

export default {
  components: {
    TopNavbar,
    DashboardContent
  }
};
</script>

<style scoped>
.link-item.router-link-active {
  max-width: 300px !important;
  background: #4caf50 !important;
  margin-left: 20px !important;
  margin-right: 20px !important;
  border-radius: 10px !important;
}
.link-item p {
  color: white !important;
}
.link-item {
  max-width: 300px !important;
  margin-left: 20px !important;
  margin-right: 20px !important;
  border-radius: 10px !important;
  margin-bottom: 10px !important;
}
</style>
