<template>
    <header>
        <h1>Boolpress</h1>

            


        

      

        <nav>
            <ul>
                <li>
                    
                    <router-link :to="{name: 'home'}">Home</router-link>
                    
                </li>
                <li>
                    <router-link :to="{name: 'blog'}">Blog</router-link>
                </li>

                <li>
                    <router-link :to="{name: 'about'}">About</router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>

export default {
    name: 'Header', 
}




</script>

<style lang="scss" scoped>


header{
    background-color: #0f0e17;
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
    

h1{
    color: whitesmoke;
    
}

header ul{
    display: flex;
    justify-content: center;
    align-items: center;
    
}

header a{
    color: whitesmoke;
}
    




.active{
    //color: dodgerblue;
    font-size: 30px;
}


    

</style>