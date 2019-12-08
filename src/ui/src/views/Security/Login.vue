<template>
  <div id="q-app">
    <div class="q-pa-md">
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <q-card style="padding: 10px">
            <q-banner
              inline-actions
              class="text-white bg-red"
              v-if="form.failed"
            >
              Login failed, please check your credentials
            </q-banner>
            <q-card-section>
              <div class="text-h6">Log In To MyStockPortal!</div>
              <q-input
                type="email"
                v-model="form.email"
                label="Please enter your email"
              />
              <q-input
                type="password"
                v-model="form.password"
                label="Please enter your password"
              />
              <q-card-separator />
              <q-card-actions align="center">
                <q-btn
                  color="primary"
                  align="center"
                  label="Log In"
                  @click="submit"
                />
              </q-card-actions>
            </q-card-section>
          </q-card>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
        failed: false
      }
    };
  },
  methods: {
    submit() {
      let postData = {
        username: this.email,
        password: this.password
      };
      let _this = this;
      this.$store.dispatch("authLogin", postData).then(function(success) {
        if (success) {
          this.$router.push({ name: "home" });
        } else {
          _this.form.failed = true;
        }
      });
    }
  }
};
</script>

<style scoped>
.card-padding {
  padding: 10px;
}
</style>
