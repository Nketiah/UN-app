<template>
    <div>

     <div class="container mt-5">
         <router-link to="/dashboard" class="btn btn-primary"> <i class="fa fa-backward"> Go home</i>  </router-link>
         <div style="text-align:center" v-if="!userdues.length">  
             <div class="alert alert-info text-lg" style="width: 300px; display:inline-block"> No payment record available</div>
        </div>
     <h3 class="text-center mb-2 text-xl" v-else>Payment history</h3>
     <table class="table table-bordered mb-20 table-striped users-table table-responsive table-sm" style="margin-bottom: 50px;">
   <thead style="background-color: #3b5998; color:#fff;">
    <tr>
      <th scope="col" width="5%">N0</th>
      <th scope="col" width="10%">Month Paid</th>
      <th scope="col" width="10%">Year Paid</th>
      <th scope="col" width="10%">Amount</th>
     

    </tr>
  </thead>
  <tbody>
    <tr v-for="dues in userdues" :key="dues.id">
      <td scope="row"> {{ dues.id }} </td>
      <td> {{ dues.paid_month }} </td>
      <td> {{ dues.paid_year }}  </td>
      <td> {{ dues.amount }}  </td>                                                                                                                                                                                                             
    </tr>

  </tbody>
 </table>
        <!-- End of Payment history table -->
      </div>
    </div>
</template>

<script>
import axios from "axios"

export default {
    

    mounted(){
        this.getAllUserDues()
    },
    
    data(){
        return {
             userdues: [],
        }
    },

    methods: {
           getAllUserDues(){
           axios.get("auth/userdues").then( (response) =>{
               this.userdues = response.data
               console.log(response.data)
           })
        },
    },
}
</script>

<style lang="">
    
</style>