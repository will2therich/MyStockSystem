import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Layout from "../templates/Layout";
import Login from "../views/Security/Login";
import CategoriesView from "../views/Categories/CategoriesView";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    component: Layout,
    children: [
      {
        path: "/",
        name: "home",
        component: Home
      },
      {
        path: "/categories",
        name: "Categories",
        component: CategoriesView
      }
    ]
  },
  {
    path: "/login",
    name: "Login",
    component: Login
  }
];

const router = new VueRouter({
  base: process.env.BASE_URL,
  routes
});

export default router;
