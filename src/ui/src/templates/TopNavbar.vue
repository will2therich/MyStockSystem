<template>
  <q-toolbar class="bg-black text-white">
    <q-btn flat round dense icon="assignment_ind"></q-btn>
    <q-toolbar-title>
      MyStockPortal
    </q-toolbar-title>
    <q-btn flat dense icon="sim_card" class="q-mr-xs" @click="$router.push({name:'Categories'})">Stock Categories</q-btn>
    <q-btn flat dense icon="gamepad">Stock Products</q-btn>
    <q-btn flat dense icon="gamepad">Stock Reports</q-btn>
  </q-toolbar>
</template>

<script>
export default {
  name: "TopNavbar"
};
</script>

<style scoped></style>
