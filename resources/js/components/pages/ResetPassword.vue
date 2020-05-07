<template>
    <div>
        
       <div class="font-sans antialiased bg-gray-200 text-gray-700 flex flex-col min-h-screen">
             <div class="container mx-auto lg:px-64 xl:px-104 my-10">  
                 <h2 class="text-xl font-bold text-center heading-font">Reset you Password</h2>
             <div class="my-card bg-white shadow-md rounded border-t-4 border-blue-brand px-12 py-12 mt-8 w-4/6 ml-40 max-w-md mx-auto">
           <form @submit.prevent="submit">     

              <div>
             <label for="email" class="text-gray-700 mb-0">Email</label>
             <input type="email" v-model="user.email" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
              <small class="text-red-500 text-xs italic mt-0"> </small> 
         </div>
          <div class="mt-6">
             <label for="password" class="text-gray-700 mb-0">Password</label>
             <input type="password" v-model="user.password" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
         </div>
         <div class="mt-6">
             <label for="password" class="text-gray-700 mb-0">Password Confirmation</label>
             <input type="password" v-model="user.password_confirmation" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
         </div>

         <div class="mt-8"> 
             <button  @click.prevent="sendResetPassword"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded relative w-full  px-4 py-3 bg-blue-brand hover:bg-blue-brand-dark" :disabled="loading"  v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
                  <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'Reset Password' }}
            </button> 
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
import axios from "axios"

export default {
   name: "resetpassword",


    data(){
        return {
            user:{
                email: "",
                password: "",
                password_confirmation:""
            },
            loginerr:"",
            loading:false
            
        }
    },
    methods: {
       sendResetPassword(){
           this.loading = true
           const token = this.$route.query.token
         axios.post("https://una-cwca.snetgh.com/api/reset-password", {...this.user, token})
         .then( (response) =>{
             if(response.data.message == "password reset succeeded")
             { 
             this.$noty.success("Password reset Successfull!")
             this.$router.push("/login")
             this.loading = false
             console.log(response.data)
             }
         }).catch( (err)=>{
             this.loading = false
            this.$noty.error("Fail to change password!, password must be 8 characters")
            
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