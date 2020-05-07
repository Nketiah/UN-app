<template>
    <div>
        
       <div class="font-sans antialiased bg-gray-200 text-gray-700 flex flex-col min-h-screen">
             <div class="container mx-auto lg:px-64 xl:px-104 my-10"> 
                <router-link to="/dashboard"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">  <i class="fa fa-backward fa-1x"></i> Back </router-link> 
                 <h2 class="text-xl font-bold text-center heading-font">Update personal details</h2>
             <div class="my-card bg-white shadow-md rounded border-t-4 border-blue-brand px-12 py-12 mt-8 w-4/6 ml-40 max-w-md mx-auto">
           <form @submit.prevent="submitdata">     

          <div>
             <label for="email" class="text-gray-700 mb-0">FirstName</label>
             <input type="text" v-model="form.firstname" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
         <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.firstname"> {{ errors.firstname[0]}}</small> 
         </div>


           <div>
             <label for="email" class="text-gray-700 mb-0">Surname</label>
             <input type="text" v-model="form.surname" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
         <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.surname"> {{ errors.surname[0]}}</small> 
         </div>

          <div>
             <label for="email" class="text-gray-700 mb-0">Mobile</label>
             <input type="text" v-model="form.mobile" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
         <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.mobile"> {{ errors.mobile[0]}}</small> 
         </div>
          <div class="">
             <label for="password" class="text-gray-700 mb-0">Email</label>
             <input type="text" v-model="form.email" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
         <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.email"> {{ errors.email[0]}}</small> 
         </div>
         <div class="mt-8"> 
             <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded relative w-full  px-4 py-3 bg-blue-brand hover:bg-blue-brand-dark" :disabled="loading"  v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
                  <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'Save changes' }}
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
   name: "login",

  mounted(){
      this.getUser()

    },

    data(){
        return {
            form:{
                firstname: "",
                surname: "",
                mobile:"",
                email:""
            },
            errors:{},
            loading:false
            
        }
    },
    methods: {
       
         submitdata() {
             this.loading = true
             axios.post("auth/user-update", this.form).then( (res)=>{
                 this.errors = res.data.errors
                   this.loading = false
                 if(res.data =="success"){
                     this.$router.push("/dashboard")
                     this.$noty.success("Profile updated successfully!")
                 }
            }).catch( (err) =>{
                 
                 this.$noty.error("Oops, something went wrong!")
            })
            
      },

      getUser(){
          axios.get("auth/user-data").then( (res)=>{
          this.form.firstname = res.data.firstname
          this.form.surname = res.data.surname
          this.form.mobile = res.data.mobile
          this.form.email = res.data.email
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