import 'vue-multiselect/dist/vue-multiselect.min.css';
import '../css/deposit.css';
import './script';


import Vue from 'vue';
import Type from './components/Type';
import Calendar from './components/Calendar';

new Vue({
    el: '#deposit',
    components: {Type, Calendar}
});