/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
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

require("./bootstrap");

window.Vue = require("vue");

import Vue from "vue";
import App from "./App.vue";

const root = new Vue({
    el: "#root",
    render: h => h(App)
});