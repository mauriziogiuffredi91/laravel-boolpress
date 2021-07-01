<template>
    <v-app>
        

        <Header />

        <main>
        <!-- Component matched by the route will render -->
        <router-view></router-view>
        </main>


        
    </v-app>
</template>

<script>
import Header from "./components/Header.vue";
import axios from 'axios';
export default{
    name: 'App',
    components:{
        Header
    },
    
}


</script>

<style lang="scss">
@import '../sass/frontoffice/_utilities.scss';
@import '../sass/frontoffice/_default.scss';
@import '~vuetify/dist/vuetify.min.css';



#app{
    background-image: url('https://images.pexels.com/photos/673648/pexels-photo-673648.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260')!important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
   
}


.navigation{
    .active-page{
        background: lightblue;
    }

}

</style>

