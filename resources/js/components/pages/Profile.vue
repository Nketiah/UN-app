<template>
    <div>
        
        <div class="font-sans antialiased bg-gray-200 text-gray-700 flex flex-col min-h-screen mb-20">
            <div class="container mx-auto lg:px-64 xl:px-104 my-10">
            <router-link to="/dashboard"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">  <i class="fa fa-backward fa-1x"></i> Back </router-link>
             <h2 class="text-xl font-bold text-center heading-font">Profile update</h2>

                <div  class="my-card bg-white shadow-md rounded border-t-4 border-blue-brand px-12 py-12 mt-8 max-w-full  max-w-md mx-auto">
                       <!-- for-data -->
    <form class="">
  <!-- <div class="flex flex-wrap -mx-3 mb-6">
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
  </div> -->
   <!-- Gender &  DoB Row -->
   <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Gender
            </label>
            <div class="relative">
                <select v-model="form.gender" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
                <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.gender"> {{ errors.gender[0]}}</small> 

                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            </div>

    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
         Date of Birth
      </label>
      <input  v-model="form.dob" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="date" placeholder="example@gmail.com">
         <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.dob"> {{ errors.dob[0]}}</small> 
    </div>
  </div>
   <!--End of  Gender &  DoB Row -->

  <!-- Occupation & Disability Row -->
   <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Occupation
      </label>
      <input  v-model="form.occupation"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-0 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="example   teacher">
          <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.occupation"> {{ errors.occupation[0]}}</small> 
    </div>

     <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Disability
            </label>
            <div class="relative">
                <select v-model="form.disability" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option>NO</option>
                <option>YES</option>
                </select>
                 <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.disability"> {{ errors.disability[0]}}</small> 
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            </div>
  </div>
  <!-- End of Occupation & Disability Row -->

  <!-- Marital & Religion Row -->
   <div class="flex flex-wrap -mx-3 mb-6">
     <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Marital Status
            </label>
            <div class="relative">
                <select v-model="form.marital" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option>Maried</option>
                <option>Single</option>
                <option>Saparated</option>
                <option>Divorced</option>
                </select>
                <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.marital"> {{ errors.marital[0]}}</small> 
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            </div>

     <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Religion
            </label>
            <div class="relative">
                <select v-model="form.religion" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option>Christianity</option>
                <option>Islamic</option>
                </select>
                <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.religion"> {{ errors.religion[0]}}</small> 
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            </div>
  </div>
  <!-- End of Marital & Religion Row-->
  <!-- Profile Picture -->
            <!-- <div class="w-full  px-3 mb-6 md:mb-0">
            <input  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-0 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="file">
                <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.photo"> {{ errors.photo[0]}}</small> 
            </div> -->
  <!-- End of Profile Picture -->

   
   <div class="mt-8"> 
      <button @click.prevent="updateUser()" :disabled="loading"  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded relative w-full  px-4 py-3 bg-blue-brand hover:bg-blue-brand-dark" v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
          <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'Save Changes' }}
      </button> 
   </div>
  <div class="flex flex-wrap -mx-3 mb-2">
   
   
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

    mounted(){
         this.getUserInfo()
         console.log("mounted")
    },

    data() {
      return {
         form:{
        //    firstname: "",
        //    surname: "",
        //    mobile: "",
        //    email: "",
           gender:"",
           dob:"",
           occupation:"",
           disability:"",
           marital:"",
           religion:"",
           joined: new Date().getFullYear()
         },
         errors:{},
         loading:false,
         user: []
      }

    },
    methods: {
     getUserInfo(){
            axios.get("auth/userinfo").then( (response)=>{
                console.log(response.data)
                this.form.gender = response.data.gender
                this.form.dob = response.data.dob
                this.form.occupation = response.data.occupation
                this.form.disability = response.data.disability
                this.form.marital = response.data.marital
                this.form.religion = response.data.religion
            })
        },
        updateUser(){
             this.loading = true
            axios.post("auth/updateuser", this.form ).then( (response)=>{
                this.errors = response.data.errors
                this.loading = false
              if(response.data.success)
               {
                 this.$noty.success("Profile updated Successfully!")
                 this.$router.push("/dashboard")
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