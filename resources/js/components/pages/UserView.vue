<template>
    <div class="container justify-center">

        <div class="card mx-auto mt-8 mb-32 shadow-sm" style="width: 35rem;">
    <div class="card-header">
         <div class="row">
              <div class="col">
                   <router-link to="/admin" class="btn btn-primary">  <i class="fa fa-backward"></i> go home </router-link>
              </div>
         </div>
          <div class="col">
                <h4 class="font-bold text-center text-gray-600 text-lg uppercase"> About  {{ firstname }} {{ surname}}</h4>
          </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">FirstName: <p class="ml-3"> {{ firstname }} </p>  </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Surname:  <p class="ml-3"> {{ surname }} </p> </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Mobile:  <p class="ml-3"> {{ mobile }} </p> </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Email:  <p class="ml-3"> {{ email }} </p> </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Gender:  <p class="ml-3"> {{ gender }} </p> </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Date of Birth:  <p class="ml-3"> {{ dob }} </p> </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Disability:  <p class="ml-3"> {{ disability }} </p> </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Occupation:  <p class="ml-3"> {{ occupation }} </p> </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Marital:  <p class="ml-3"> {{ marital }} </p> </li>
        <li class="list-group-item inline-flex text-lg text-gray-700 font-bold">Religion:  <p class="ml-3"> {{ religion }} </p> </li>
    </ul>
    </div>

    </div>
</template>

<script>
import axios from "axios"
export default {
    name:"UserView",
     
     mounted(){
         this.getUserDetails(),
         this.getUserDetailsTwo()
     },
      data(){
         return {
             firstname:"",
             surname:"",
             mobile:"",
             email:"",
             gender:"",
             dob:"",
             disability:"",
             occupation:"",
             marital:"",
             religion:"",
             user_id:this.$route.params.id
         }
      },
      methods: {
          getUserDetails(){
             axios.get(`auth/user-details/${this.user_id}`).then( (res)=>{
                 console.log(res.data)
                 this.firstname = res.data.firstname
                 this.surname = res.data.surname
                 this.mobile = res.data.mobile
                 this.email = res.data.email
             })
          },
          getUserDetailsTwo(){
             axios.get(`auth/user-details-two/${this.user_id}`).then( (res)=>{
                 console.log(res.data)
                 this.gender = res.data.gender
                 this.dob = res.data.dob
                 this.disability = res.data.disability
                 this.occupation = res.data.occupation
                 this.marital = res.data.marital
                 this.religion = res.data.religion
             })
          }
      },
}
</script>

<style lang="">
    
</style>