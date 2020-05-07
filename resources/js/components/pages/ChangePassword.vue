<template>
    <div>
       
       <div class="font-sans antialiased bg-gray-200 text-gray-700 flex flex-col min-h-screen">
             <div class="container mx-auto lg:px-64 xl:px-104 my-10">
                <router-link :to=" user.isAdmin ? '/admin': '/dashboard'"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">  <i class="fa fa-backward fa-1x"></i> Back </router-link>
                 <h2 class="text-xl font-bold text-center heading-font">Change your password</h2>
             <div class="my-card bg-white shadow-md rounded border-t-4 border-blue-brand px-12 py-12 mt-8 w-4/6 ml-40 max-w-md mx-auto">
           <form @submit.prevent="changePassword">     

              <div>
             <label for="oldpassword" class="text-gray-700 mb-0">Old Password</label>
             <input type="text" v-model="form.oldpassword" required class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
              <small class="text-red-500 text-xs italic mt-0" v-if="errors"> {{ errors}}</small> 
         </div>
          <div class="mt-4">
             <label for="password" class="text-gray-700 mb-0">New Password</label>
             <input type="password" v-model="form.newpassword" required class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
             <small class="text-red-500 text-xs italic mt-0" v-if="newpassword_err "> {{ newpassword_err[0]}}</small> 
         </div>

          <!-- <div class="mt-4">
             <label for="password" class="text-gray-700 mb-0">Confirm Password</label>
             <input type="password" v-model="form.password_confirmation" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
         </div> -->

         <div class="mt-4"> 
             <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded relative w-full  px-4 py-3 bg-blue-brand hover:bg-blue-brand-dark" :disabled="loading"  v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
                  <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'Change password' }}
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
               oldpassword:"",
                newpassword: "",
            },
            errors:"",
            newpassword_err:"",
            loading:false
            
        }
    },
    methods: {
           changePassword(){
              axios.post("auth/change-password", this.form).then( (response)=>{
                console.log(response.data)
                this.errors = response.data.oldpassword
                if(response.data.errors){
                   this.$noty.error(response.data.errors.newpassword)
                }else if(response.data.newerror){
                   this.$noty.error("Your new password can not be same as old password")
                }
               
                if(response.data.success)
               {
                 if(this.user.isAdmin === "admin")
                 {
                      this.$router.push("/admin")
                     this.$noty.success("Password changed Successfully!")
                 }else{
                     this.$router.push("/dashboard")
                     this.$noty.success("Password changed Successfully!")
                 }

               }

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