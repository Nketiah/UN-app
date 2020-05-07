<template>
    <div>
         
        <div class="font-sans antialiased bg-gray-200 text-gray-700 flex flex-col min-h-screen mb-20">
            <div class="container mx-auto lg:px-64 xl:px-104 my-10">
                 <router-link to="/admin"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">  <i class="fa fa-backward fa-1x"></i> go home </router-link>
             <h2 class="text-xl font-bold text-center heading-font">Create new user</h2>

                <div  class="my-card bg-white shadow-md rounded border-t-4 border-blue-brand px-12 py-12 mt-8 max-w-full  max-w-md mx-auto">
                       <!-- for-data -->
    <form class="">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        First Name
      </label>
      <input  v-model="form.firstname"  v-bind:class="{'border-red-500': errors.firstname}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-0 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
          <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.firstname"> {{ errors.firstname[0]}}</small> 
    </div>

    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
         Surname
      </label>
      <input  v-model="form.surname" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
          <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.surname"> {{ errors.surname[0]}}</small> 
    </div>
  </div>

   <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Mobile
      </label>
      <input v-model="form.mobile" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-0 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="555-555-555">
        <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.mobile"> {{ errors.mobile[0]}}</small> 
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
         E-mail Address
      </label>
      <input  v-model="form.email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="email" placeholder="example@gmail.com">
         <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.email"> {{ errors.email[0]}}</small> 
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Set Password
      </label>
      <input  v-model="form.password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-0 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
      <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.password"> {{ errors.password[0]}}</small> 
  </div>

    <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Select user role
            </label>
            <div class="relative">
                <select v-model="form.is_admin" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option class="admin">admin</option>
                <option value="user">user</option>
                </select>
                <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.is_admin"> {{ errors.is_admin[0]}}</small> 
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            </div>
  </div>
   
   <div class="mt-8"> 
      <button @click.prevent="CreateUser()" :disabled="loading"  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded relative w-full  px-4 py-3 bg-blue-brand hover:bg-blue-brand-dark" v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
          <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'Create user' }}
      </button> 
   </div>
  
</form>
           </div>
      </div>
  </div>


    </div>
</template>

<script>

import axios from "axios"

export default {
    components: {
       
    },
    data() {
      return {
         form:{
           firstname: "",
           surname: "",
           mobile: "",
           email: "",
           password: "",
           is_admin:""
         },
         errors:{},
         loading:false
      }

    },
    methods: {
      CreateUser(){
            this.loading = true
           axios.post("auth/create-user", this.form)
             .then( (response) =>{
              this.errors = response.data.errors
              console.log(response.data.errors)
              this.loading = false
               if(response.data.success)
               {
                 this.$router.push("/admin")
                 this.$noty.success("User Created Successfully!")
               }

             }).catch( (error) =>{
                console.log(response.data.errors)
                this.errors = error.response.data.errors
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