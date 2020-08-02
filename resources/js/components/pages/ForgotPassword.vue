<template>
<div>
   
  <div class="font-sans antialiased bg-gray-200 text-gray-700 flex flex-col min-h-screen">
             <div class="container mx-auto lg:px-64 xl:px-104 my-10">  
                 <h2 class="text-xl font-bold text-center heading-font">Forgot Password</h2>
             <div class="my-card bg-white shadow-md rounded border-t-4 border-blue-brand px-12 py-12 mt-8 w-4/6 ml-40 max-w-md mx-auto">
           <form @submit.prevent="submit">     

              <div>
             <label for="email" class="text-gray-700 ">Email</label>
             <input type="email" v-model="email" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
              <small class="text-red-500 text-xs italic mt-0"> {{ emailerr}}</small> 
         </div>
         <div class="mt-8"> 
             <button @click.prevent="sendForgotPassword"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded relative w-full  px-4 py-3 bg-blue-brand hover:bg-blue-brand-dark" :disabled="loading"  v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
                  <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'Send Reset Link' }}
            </button> 
        </div>
         <div class="text-sm text-center mt-6">
              <router-link to="/login" class="hover:bg-gray-100 bg-white px-2 py-1 rounded flex items-center">
                  <span>Back</span>
                 <svg class="fill-current w-3 h-3 ml-1" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M12.393 8.667H2a.667.667 0 110-1.334h10.393L8.86 3.8a.667.667 0 11.947-.933l4.666 4.666a.667.667 0 010 .934l-4.666 4.666a.666.666 0 01-.947-.933l3.534-3.533z"></path></svg>
          </router-link> 

         </div>
         <div class="text-center">
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
   name: "forgotpassword",

    data(){
        return {
           
            email: "",
            emailerr:"",
            loading:false
            
        }
    },
    methods: {
        sendForgotPassword(){
               this.loading = true
                axios.post("https://unacwca.snetgh.com/api/forgot-password",{email: this.email}).then( (response)=>{
                if(response.data.message == "Email sent")
                {
                    this.$noty.success("Email sent, please check your inbox!")
                    this.loading = false
                }
                  console.log(response.data.message)
                }).catch((err) =>{
                    this.$noty.error("Failed to send Email!, please check your email")
                    this.loading = false
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