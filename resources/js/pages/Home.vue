<template>
    <div class="container">

        <h1>HOME WELCOME</h1>

        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas maxime vel placeat cupiditate, 
            corrupti quam, minus ratione cumque ut rerum architecto temporibus suscipit enim labore quaerat? 
            Fugit, reiciendis. Repellat, cumque!
        </p>


        <div class="text-center">
            <v-dialog
            v-model="dialog"
            width="500"
            >
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                    color="red lighten-2"
                    dark
                    v-bind="attrs"
                    v-on="on"
                    >
                        Privacy policy
                    </v-btn>
                </template>

                <v-card>
                    <v-card-title class="text-h5 grey lighten-2">
                        Privacy Policy
                    </v-card-title>

                    <v-card-text>
                        Accosenti al trattamento dei tuoi dati?
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="primary"
                            text
                            @click="dialog = false"
                        >
                           Accept
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </div>


        
    </div>
</template>

<script>
export default {
    name: 'Home',
    
    data () {
      return {
        dialog: false,
      }
    },
  
}
</script>

<style>

</style>