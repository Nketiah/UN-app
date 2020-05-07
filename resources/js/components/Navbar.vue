<template>
    <div>
     
<nav class="navbar navbar-expand-lg" style="background: rgb(28, 117, 188); height: 60px;">
    <div class="container">
      <img src="img/un.jpeg" height="40" width="40" class="rounded">  <router-link to="" v-if="authenticated" class="navbar-brand ml-5" href="#" style="color: #fff"> Dashboard</router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
    <ul class="navbar-nav ml-auto mr-20">
      <li class="mr-8 nav-item"> <a href="https://twitter.com" target="_blank" class="nav-link text-white hover:text-gray-400 outline-none focus:shadow-outline-blue inline-block"> <i class="social fab fa-facebook-f fa-2x"></i>  </a> </li>
     <li class="mr-8 nav-item"> <a href="https://twitter.com" target="_blank" class="nav-link  text-white hover:text-gray-400 outline-none focus:shadow-outline-blue inline-block"> <i class="social fab fa-instagram fa-2x"></i>  </a> </li>
     <li class="mr-8 nav-item"> <a href="https://twitter.com" target="_blank" class="nav-link mr-10 text-white hover:text-gray-400 outline-none focus:shadow-outline-blue inline-block"> <i class="social fab fa-twitter fa-2x"></i>  </a> </li>



     <template v-if="authenticated">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff">
        {{ user.surname }}
       
        </a>
        <div class="dropdown-menu mr-40" aria-labelledby="navbarDropdown">
          <!-- <changepassword/> -->
          <a @click.prevent="logout" class="dropdown-item" href="#">  <i class="fas fa-sign-out-alt"></i> Logout </a>
            <router-link to="/changepassword" class="dropdown-item" href="#">  <i class="fas fa-sign-out-alt"></i> Change password </router-link>
        </div>
      </li>
    
    
    
    </template>
    <template v-else>
         <li class="nav-item active">
        <router-link to="/login" class="nav-link" href="#" style="color: #fff">Login</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/register" class="nav-link" href="#" style="color: #fff">Register</router-link>
      </li>
    </template>
    
    </ul>
   
    
  </div>

    </div>
</nav>
    </div>

</template>
<script>
import {mapGetters, mapActions} from "vuex"
import changepassword from "../components/pages/ChangePassword"

export default {
    name: "Navbar",
    components:{
      changepassword
    },
     computed: {
       ...mapGetters({
         authenticated: "auth/authenticated",
         user: "auth/user"
       })
     },
     methods: {
       ...mapActions({
         logoutAction: "auth/logout"
       }),
       logout(){
         this.logoutAction().then( ()=>{
           this.$router.replace({name: "login"})
           this.$noty.success("Successfully logged out!")

         })
       }

     }
}
</script>


<style >

</style>