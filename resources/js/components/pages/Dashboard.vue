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
            <li> <router-link to="/update-profile"> <i class="edit fas fa-user-edit fa-1x" title="Edit"></i>  update  Profile</router-link> </li>
            <li> <router-link to="/dues-history"> <i class="fas fa-money-bill-wave"></i> Payment history</router-link> </li>
            <!-- <li> <a href="#"> <i class="fas fa-info-circle"></i> Help</a> </li> -->
        </ul>
       </div>
       
       <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closeSideMenu()"> &times; </a>
        <a href="#"> <i class="fa fa-home"></i> Home</a>
        <a href="#"> <i class="fa fa-users"></i> Users </a>
        <a href="#" class=""> <i class="fas fa-money-bill-wave"></i> Dues & payament </a>
        <a href="#"> <i class="fas fa-info-circle"></i> Help </a>
      </div>
           <!-- <p class="my-alert text-center mt-10">Please update your profile details</p> -->
            <div class="" v-if="!dob" style="text-align:center"> 
             
           <div class="alert alert-danger text-center mt-3 text-lg" style="width: 300px; display:inline-block"> Please update your profile </div>
            </div>
    <div class="row justify-center container mt-6 mb-40">
  <div class="col-sm-4">
    <div class="card pb-8">
      <div class="card-body" style="position:relative; padding-bottom:30%">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>
         <div v-if="useravatar">
            <img class="h-16 w-15 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6" :src="useravatar">
        </div>
         <div v-else>
        <img class="h-16 w-15 md:h-24 md:w-24 rounded-full mx-auto md:mx-0 md:mr-6" src="img/avatar.jpeg">
         </div>
         <h5 class="text-center text-gray-500"> {{ firstname }} </h5>
           <div class="text-center">
                <!-- <button class="btn btn-primary btn-sm mt-2">choose photo</button> -->
            <router-link to="/photo" class="btn btn-primary btn-sm">choose photo</router-link>
           </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card pb-16">
      <div class="card-body">
        <h5 class="card-title text-center text-lg uppercase font-bold text-gray-600"> <p class="text-gray-700 inline-flex">About</p>  {{ firstname+"  "+surname}} </h5>
        <p class="card-text"></p>
             <div class="">
                 <div class="p-head py-1 mb-2"> <p>Query infomation</p>  </div>
                <h2 class="text-lg text-gray-600 inline-flex"> <p class="mr-3">FirstName:</p>  {{ surname}}</h2><br>
                <div class="text-gray-600 text-lg inline-flex"> <p class="mr-3">Surname:</p> {{ firstname}}</div><br>
                <div class="text-gray-600 text-lg inline-flex"><p class="mr-3">Mobile:</p> {{ mobile}}</div><br>
                <div class="text-gray-600 text-lg inline-flex"> <p class="mr-3">Email:</p> {{ email }} </div><br>
                <router-link to="/update-user" class="btn btn-primary btn-block">Edit</router-link>
            </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center text-lg uppercase font-bold text-gray-600"><p class="text-gray-700 inline-flex">About</p> {{ firstname+"   "+surname}}</h5>
        <p class="card-text"></p>
           <div class="">
                <div class="p-head py-1 mb-2"> <p>Query infomation</p>  </div>
                <h2 class="text-lg text-gray-600 inline-flex"> <p class="mr-3">Gender:</p> {{ gender}}</h2><br>
                <div class="text-gray-600 text-lg inline-flex"> <p class="mr-3">Date of Birth:</p> {{ dob }} </div><br>
                <div class="text-gray-600 text-lg inline-flex"><p class="mr-3">Disability:</p> {{ disability }} </div><br>
                <div class="text-gray-600 text-lg inline-flex"> <p class="mr-3">Occupation:</p> {{ occupation }} </div><br>
                <div class="text-gray-600 text-lg inline-flex"> <p class="mr-3">Marital:</p> {{ marital }}  </div><br>
                <div class="text-gray-600 text-lg inline-flex"> <p class="mr-3">Religion:</p> {{ religion }} </div><br>
                <!-- <div class="text-gray-600 text-lg inline-flex"> <p class="mr-3">Email:</p> erinlindford@example.com </div><br> -->
                 <router-link to="/update-profile" class="btn btn-primary btn-block">Edit</router-link>
            </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- / -->
</template>
<script>

import axios from "axios"

export default {
    name:"dashboard",
    
    mounted() {
        this.getUser(),
        this.getUserProfile(),
        this.getAvatar()
    },                  


    data() {
      return {
          avatar:false,
          firstname:"",
          surname:"",
          mobile:"",
          email:"",
          gender:"",
          dob:"",
          occupation:"",
          disability:"",
          marital:"",
          religion:"",

          image:null,
          imagepreview:null,
          imgerror:"",
          useravatar:"",
        
      }
    },

    methods: {
        getUser(){
           axios.get("auth/user-data").then( (response) =>{
               this.firstname = response.data.firstname
                this.surname = response.data.surname
                 this.mobile = response.data.mobile
                  this.email = response.data.email
               console.log(response.data)
           })
        },

        getUserProfile(){
           axios.get("auth/user-profile-data").then( (response) =>{
               this.gender = response.data.gender
                this.dob = response.data.dob
                this.occupation = response.data.occupation
                this.disability = response.data.disability
                this.marital = response.data.marital
                this.religion = response.data.religion

               console.log(response.data)
           })
        },
        getAvatar(){
            axios.get("auth/getavatar").then( (res)=>{
                if(res.data != "[object Object]"){
                  this.useravatar = "photos/"+res.data
                  console.log(res.data)
                  return
                }
                this.useravatar = ""
               console.log(res.data)
            })
        },
        checkAlert(){
          if(Object.keys(this.dob).length === 0){
            this.empty = true
          }
          this.empty = false
          //this.empty = this.dob
          //console.log(this.empty)
          //console.log(this.dob+ "some")
          // setInterval(() => {
          //   if(!this.dob){
          //      //this.$noty.error("Please update your profile")
          //      //alert("Hmmm")
          //   }else{

          //   }
            
          // }, 9000);
        }
   
         
    }

}
</script> 


<style scoped>

.p-head{
    background: #227DC7;
    height: 32px;
    color: #fff;
    text-align: center;
}
.my-icon{
  color: #3b5998;
}
.my-alert{
    font-size: 20px;
    background: rgb(170, 13, 13);
    height:  50px;
}
.card{
 border: 1px solid #3b5998;
 background: #f4f4f4;

}

.card:hover{
    cursor: pointer;
}

body{
    background: silver;
    overflow-x: hidden;
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


@media(max-width:568px){
    .navbar-items{display: none}
}

</style>