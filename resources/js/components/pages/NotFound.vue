<template>
    <div>
        <h1 class="text-center mt-32" style="font-size:25px;">Page Not Found | 404</h1>
        <div class="content">
               <!-- <button @click="gohome" class="btn btn-primary">  <i class="fa fa-backward"></i> Go home</button> -->
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex"

export default {
    computed: {
            ...mapGetters({
                 user: "auth/user"
            })
        },

    //  methods: {
    //      gohome(){
    //          if(this.user.isAdmin === "admin"){
    //                 this.$router.push("/admin")
    //             }
    //            else if(this.user.isAdmin === "user"){
    //              this.$router.push("/dashboard")
    //            }
    //      }
     //},
}
</script>

<style scoped>
    .content{
  margin: auto;
  width: 50%;
    text-align: center;
  padding: 10px;
}
</style>