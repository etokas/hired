import Vue from 'vue'
import App from './App.vue'
import  VueRouter from 'vue-router'
import Home from "./components/home/Home";
import Post from "./components/post/Post";


Vue.config.productionTip = false;

Vue.use(VueRouter);

const routes = [
  { path: '/', component: Home },
  { path: '/deposer-une-offre', component: Post }
];

const router = new VueRouter({
  routes,
  mode: 'history'
});

new Vue({
  router,
  render: h => h(App),
}).$mount('#app');
