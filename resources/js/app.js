/**
 * 
 * Front Office
 * 
 */

// require('./bootstrap');

// window.Vue = require('vue');

// //vue instance
// import Vue from "vue";
// import App from ' ./App.vue';

// const root = new Vue({
//     el: '#root',
//     render: h => h(App)
// });
//errore sugli apici, vi vogliono le virgolette



window.Vue = require("vue");
//window.axios = require("axios");

import Vue from "vue";
import App from "./App.vue";

const root = new Vue({
    el: "#root",
    render: h => h(App)
});