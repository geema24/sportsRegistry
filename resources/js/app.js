require('./bootstrap');

window.Vue = require('vue').default;
import Vue from "vue";
import VueRouter from "vue-router";
import { routes } from "./routes";
import Toasted from 'vue-toasted';

Vue.use(VueRouter);

Vue.component('header-component', require('./components/Header.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router
});

Vue.use(Toasted,{
    position: 'bottom-right',
    duration: 5000,
});