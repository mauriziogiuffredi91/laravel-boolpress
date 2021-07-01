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



window.Vue = require('vue');
import Vue from 'vue';
//window.axios = require("axios");
//import vuetify
import Vuetify from 'vuetify';
//import Vue from "vue";
import App from './App.vue';
import router from './routes.js';


//register vuetify
Vue.use(Vuetify);

const vuetify = new Vuetify();


const root = new Vue({
    el: "#root",
    vuetify,
    router: router, //shortcut
    render: h => h(App)
});

