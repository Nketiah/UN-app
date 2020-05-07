<template>
    <div>

          <div class="my-navbar">
               <span class="open-slide">
               <!-- <a href="#" onclick="openSlideMenu()">
                <svg width="30" height="30">
                    <path d="M0, 5 30,5" stroke="#fff" stroke-width="5" />
                    <path d="M0,14 30, 14" stroke="#fff" stroke-width="5" />
                    <path d="M0,23 30,23" stroke="#fff" stroke-width="5" />
                </svg>
            </a> -->
        </span>
        <ul class="navbar-items">
            <li> <a href="#"> <i class="fa fa-home"></i> Home</a> </li>
             <!-- <li> <a href="#"> <i class="fa fa-users"></i> Users</a> </li> -->
            <li> <router-link to="/create-user"> <i class="fa fa-plus"></i> Create new user</router-link> </li>
            <!-- <li> <a href="#"> <i class="fas fa-info-circle"></i> Help</a> </li>  -->
              <!-- My-search bar -->
               <div class="search-box">
                    <div class="input"> <li> <input type="search" v-model="searchItem" placeholder="Search here..."> </li> </div>
                    <div class="btn-search"> <button >  <i class="fa fa-search"></i>  </button> </div>
             </div>
              <!-- End of search bar -->
        </ul>
       </div>
       
       <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closeSideMenu()"> &times; </a>
        <a href="#"> <i class="fa fa-home"></i> Home</a>
        <a href="#"> <i class="fa fa-users"></i> Users </a>
        <a href="#"> <i class="fas fa-money-bill-wave"></i> </a>
        <a href="#"> <i class="fas fa-info-circle"></i> Help </a>
      </div>

    
      
    <div class="flex-container" id="main">
          <div class="flex-child">
              <i class="my-icon fa fa-users fa-4x"></i>
             <div style="font-size: 25px">  <small class="text">users</small>  <span class="badge  badge-pill badge-secondary">  {{ totalUsers }}  </span> </div>
          </div>

          <div class="flex-child">
              <i class="my-icon fas fa-wallet fa-4x"></i>
             <div style="font-size: 25px">  <small class="text">dues</small>   &cent;  <span class="badge  badge-pill badge-secondary">  {{ totalDues }}  </span>  </div>
          </div>

          <div class="flex-child">
             <i class="my-icon far fa-bell fa-4x"></i>             
          <div style="font-size: 25px"> <small class="text"> {{ month }} </small>    &cent; <span class="badge  badge-pill badge-secondary">  {{ currentMonth }}  </span>  </div>
          </div>

           <div class="flex-child">
               <i class="my-icon fas fa-chart-bar fa-4x"></i>
          <div style="font-size: 25px"> <small class="text"> {{ year }} </small> &cent;  <span class="badge  badge-pill badge-secondary">  {{ currentYear }}  </span>  </div>
          </div>

   </div>

 <!-- User display table -->
 <div class="container"> 
  <table class="table table-bordered mb-20 table-striped users-table table-responsive table-sm mb-32">
   <thead style="background-color: #3b5998; color:#fff;">
    <tr>
      <th scope="col" width="5%">N0</th>
      <th scope="col" width="10%">First Name</th>
      <th scope="col" width="10%">Surname</th>
      <th scope="col" width="10%">Mobile</th>
      <th scope="col" width="10%">Email</th>
      <th scope="col" width="5%">User Role</th>
      <th scope="col" width="7%">Action</th>


    </tr>
  </thead>
  <tbody v-if="users">
    <tr  v-for="user in filterUsers" :key="user.id" class="mb-0">
      <td scope="row"> {{ user.id }} </td>
      <td> {{ user.firstname }} </td>
      <td> {{  user.surname}} </td>
      <td> {{  user.mobile}} </td>                                                                                                                                                                                                             
      <td> {{  user.email}} </td>   
      <td> {{  user.is_admin }} </td>  
      <!-- <div class="form-group">
       <select  class="form-control" @click.self="updateRole($event, user.id)"  :name="userinfo.is_admin"> 
        <option disabled value="">Role</option>
        <option value="user">user</option>
        <option value="admin">admin</option>
      </select>

    </div> -->
                                 
      <td>  <router-link :to="`/add-dues/${user.id}`">  <i class="edit far fa-money-bill-alt fa-2x" title="Pay"></i>  </router-link>    <router-link :to="`/user-details/${user.id}`">  <i class="edit fas fa-user-edit fa-2x" title="View"></i> </router-link>     <button @click.stop="deleteUser(user.id)"> <i class="edit fa fa-trash fa-2x" title="Delete"></i> </button> </td>
    </tr>

  </tbody>
 </table>
  </div>
 
 
  </div>
</template>
<script>

import axios from "axios"
import User from "../pages/User"

export default {
    name:"dashboard",
    
    mounted() {
         this.getAllUsers(),
         this.getTotalDues(),
         this.getTotalUsers(),
         this.getCurrentMonth(),
         this.getCurrentYear()

    },

    data() {
      return {
          toggleModal:false,
          searchItem:"",
          users: [],
          totalDues:"",
          currentMonth:"",
          currentYear:"",
          totalUsers:"",
          selectedrole:"",
          userinfo:{is_admin:""},
          month: new Date().toLocaleString('default', { month: 'long' }),
          year: new Date().getFullYear()
      }
    },

    methods: {
        getAllUsers(){
            axios.get("auth/users").then( (response)=>{
              this.users = response.data
            })
        },
        getTotalDues(){
          axios.get("auth/totaldues").then( (response) =>{
              this.totalDues = response.data
          })
        },
        getTotalUsers(){
            axios.get("auth/countusers").then( (response) =>{
              this.totalUsers = response.data
          })
        },
        updateRole(event, userid){
           this.userinfo.is_admin = event.target.value
           axios.put(`auth/updaterole/${userid}`, this.userinfo).then( (response) =>{
               if(response.data.success)
               {
                 this.$noty.success("User Role Changed Successfully!")
               }
           })
        },
        getCurrentMonth(){
            axios.get("auth/currentmonth").then( (response) =>{
              this.currentMonth = response.data.total
              console.log(response.data.total)
          })
        },
        getCurrentYear(){
            axios.get("auth/currentyear").then( (response) =>{
              this.currentYear = response.data.total
              console.log(response.data.total)
          })
        },
        deleteUser(userid){
          let self = this
          let noty = this.$noty
          let call = this
      this.$vueConfirm.confirm(
        {
          auth: false,
          message: `Are you sure?`,
          button: {
            no: 'No',
            yes: 'Yes'
          }
        },function(confirm) {
          if (confirm == true) {
              axios.delete(`auth/deleteuser/${userid}`).then( (response) =>{
              console.log(response.data)
              if(response.data.deleted){
                noty.success("User Account deleted Successfully!")
                call.getAllUsers()
              }
          })
          
          }
        }
      )

        },


    },

    computed: {
        filterUsers(){
         return this.users.filter( (user) =>{
             return user.firstname.toLowerCase().match(this.searchItem.toLowerCase()) || 
             user.mobile.toLowerCase().match(this.searchItem.toLowerCase()) ||
             user.email.toLowerCase().match(this.searchItem.toLowerCase()) ||
             user.surname.toLowerCase().match(this.searchItem.toLowerCase())
         })
        }
    },

}
</script> 

<style scoped>

.edit{
    color:#3B5897
}

.users-table{
    /* border-collapse: collapse; */
}
.users-table td {
   /* padding: 0; 
   margin: 0; */
}


body{
  overflow-x: auto;
  overflow-y: auto;
}

.my-icon{
  color: #3b5998;
}

.card{
 border-bottom: 2px solid #3b5998;

}

.card:hover{
    cursor: pointer;
}

body{
    background: silver;
    
}

.my-navbar{
    background-color: #3b5998;
    overflow: hidden;
    height: 63px;
    width: 100%;
    transition:margin-left 0.5s;
    overflow: hidden;
}

.my-navbar a{
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.my-navbar ul{
    margin: 8px 0 0 0;
    list-style: none;
}

.my-navbar a:hover{
    background-color: #ddd;
    color: #000;
}

.side-nav{
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    opacity: 0.9;
    overflow-x: hidden;
    padding-top: 60px;
    transition: 0.1s;
}
.side-nav a{
    padding: 10px 10px 10px 30px;
    text-decoration: none;
    color: #ccc;
    font-size: 22px;
    display: block;
    transition: 0.3s;
}

.side-nav a:hover{
    color: #fff;
}

.side-nav .btn-close{
    position: absolute;
    top: 0;
    right: 22px;
    font-size: 40px;
    margin-left: 50px;
}
#main{
    transition:margin-left 0.5s;
    padding: 20px;
    overflow: hidden;
    width: 100%
}

.search-box{
    position: relative;
    left: 20%;
    padding: 10px 10px;
    display: flex
}
.search-box input{
    height: 30px;
    /* width: 30%; */
    padding: 0px 12px;
    font-size: 16px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bolder;
}
.btn-search{
   position: relative;
   color: #fff;
   height: 30px;
   background: #111;
   padding: 4px 12px;
}

.flex-container{
    display: flex;
    justify-content: space-around
}

.flex-child{
 flex: 1;
 background: #f4f4f4;
 border: #3B5897 solid 1px;
 padding-top: 0.5rem;
 padding-right: 10px;
 text-align: center;
 margin: 0.75rem;
 /* border-bottom: 2px solid #3B5897; */
}

@media(max-width:568px){
    .navbar-items{display: none}
}

</style>