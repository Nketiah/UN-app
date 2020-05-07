<template>
    <div>
        
       <div class="font-sans antialiased bg-gray-200 text-gray-700 flex flex-col min-h-screen">
             <div class="container mx-auto lg:px-64 xl:px-104 my-10">  
                 <h2 class="text-xl font-bold text-center heading-font">Login</h2>
             <div class="my-card bg-white shadow-md rounded border-t-4 border-blue-brand px-12 py-12 mt-8 w-4/6 ml-40 max-w-md mx-auto">
           <form @submit.prevent="submitdata">     

              <div>
             <label for="email" class="text-gray-700 mb-0">Email</label>
             <input type="email" v-model="form.email" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
              <small class="text-red-500 text-xs italic mt-0"> {{ loginerr}}</small> 
         </div>
          <div class="mt-8">
             <label for="password" class="text-gray-700 mb-0">Password</label>
             <input type="password" v-model="form.password" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
         </div>
         <div class="mt-8"> 
             <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded relative w-full  px-4 py-3 bg-blue-brand hover:bg-blue-brand-dark" :disabled="loading"  v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
                  <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'Login' }}
            </button> 
        </div>
         <div class="text-sm text-center mt-6">
               Don't have an account? 
             <router-link to="/register" class="text-sm text-blue-600 hover:text-blue-800"> Register</router-link>
         </div>
         <div class="text-center">
             <router-link to="forgot-password" class="text-sm text-blue-600 hover:text-blue-800">Forgot Password?</router-link>
         </div>
         </form>
    </div>
   </div>
             </div>
    <!-- </div>
    </div> -->

   
    </div>
  

</template>

<script>
// import axios from "axios"
import {mapActions, mapGetters} from "vuex"

export default {
   name: "login",

      computed: {
            ...mapGetters({
                 user: "auth/user"
            })
        },

    data(){
        return {
            form:{
                email: "",
                password: ""
            },
            loginerr:"",
            loading:false
            
        }
    },
    methods: {
        ...mapActions({
           login: "auth/login"
        }),
       
         submitdata() {
            this.loading = true
             this.login(this.form).then( (res)=>{
                 this.loading = false
                 this.$noty.success("Successfully logged in!")
                if(this.user.isAdmin === "admin"){
                    this.$router.push("/admin")
                }
               else{
                 this.$router.replace({name: "dashboard"})
               }
            }).catch( (err) =>{
                 this.loginerr = "These credentials do not match our records."
                 this.loading = false
                 this.$noty.error("Oops, something went wrong!")
            })
            
      }
    }

}
</script>
<style>
    .my-card{
        border-top: 3px solid #1D75BC;
    }
</style>