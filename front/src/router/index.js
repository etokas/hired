import Vue from 'vue';
import Router from 'vue-router';
import Home from '@/components/home/Home';
import Post from '@/components/post/Post';

Vue.use(Router);

export default new Router({
  routes: [
    { path: '/', component: Home },
    { path: '/deposer-une-offre', component: Post },
  ],
});
