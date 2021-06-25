//Dipendenze
import Vue from 'vue';
import VueRouter from 'vue-router';

//Referenza router con vue
Vue.use(VueRouter);

//componenti per le pagine
import Home from './pages/Home.vue'
import About from './pages/About.vue'


//Def rotte app
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        }

    ]
});

export default router;