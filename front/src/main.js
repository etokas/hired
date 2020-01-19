import Vue from 'vue';
import router from '@/router';

Vue.config.productionTip = false;


const vm = new Vue({
  // eslint-disable-line no-unused-vars
  el: '#app',
  router,
  template: '<router-view />',
});
