<template>
    <div class="container">

        <div v-if="post">

            <h1>{{post.title}} </h1>

            <div class="post-info">
                
                <div class="box-category">

                    <span v-if="post.category">{{post.category.name}}</span>
                    <Tags :tags="post.tags"/>

                </div>


                

            </div>

            <div>{{post.content}}</div>
        </div>


       
        <Loader v-else/>
        
    </div>
</template>

<script>
import axios from 'axios';
import Loader from '../components/Loader.vue';
import Tags from '../components/Tags.vue';
export default {
    name: 'PostDetail',
    components: {
        Loader,
        Tags

    },
    data(){
        return {
            post: null,

        }
    },
    created(){
        this.getPostDetails();
    },
    methods: {
        getPostDetails(){
            //console.log('api call here');

            axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
                .then(res=> {
                    console.log(res.data);
                    this.post = res.data;
                })
                .catch(err=>{
                    console.log(err);
                });
        }
    }
}
</script>

<style lang="scss" scoped>
    .box-category{
        display: flex;
        align-items: center;
    }
</style>