<template>
    <div>
          
       <div class="font-sans antialiased bg-gray-200 text-gray-700 flex flex-col min-h-screen">
             <div class="container mx-auto lg:px-64 xl:px-104 my-10"> 

               <router-link to="/admin"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">  <i class="fa fa-backward fa-1x"></i> Back </router-link>
                 <h2 class="text-xl font-bold text-center heading-font">User Dues</h2>
             <div class="my-card bg-white shadow-md rounded border-t-4 border-blue-brand px-12 py-12 mt-8 w-4/6 ml-40 max-w-md mx-auto">
           <form @submit.prevent="submit">     

          <div class="mb-3">
             <label for="amount" class="text-gray-700 mb-0">Amount</label>
             <input type="text" v-model="form.amount" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1" placeholder="200.00">
          <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.amount"> {{ errors.amount[0]}}</small> 
         </div>

          <div class="mb-3">
             <label for="month" class="text-gray-700 mb-0">Month</label>
             <input type="text" v-model="form.paid_month" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
          <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.paid_month"> {{ errors.paid_month[0]}}</small> 
         </div>

          <div class="">
             <label for="year" class="text-gray-700 mb-0">Year</label>
             <input type="text"  v-model="form.paid_year" class="bg-gray-200 w-full border border-gray-400 rounded px-3 py-2 mt-1">
             <small class="text-red-500 text-xs italic mt-0" v-if="errors && errors.paid_year"> {{ errors.paid_year[0]}}</small> 
              <small class="text-red-500 text-xs italic mt-0" v-if="year_error"> {{ invalidyear }} </small> 
         </div>
         <div class="mt-8">
             <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded relative w-full  px-4 py-3 bg-blue-brand hover:bg-blue-brand-dark" :disabled="loading"  v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
                  <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'Make payment' }}
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
    components: {
       
    },
    data() {
      return {
         form:{
           amount:"",
           paid_month: new Date().toLocaleString('default', { month: 'long' }),
           paid_year: new Date().getFullYear(),
           user_id: this.$route.params.id,
           
         },
         date: new Date(),
         today: new Date().getFullYear(),
         errors:{},
         loading:false,
         invalidyear:"",
         year_error: false,
         amount_error:"",

      }

    } ,
    methods: {
        submit(){

              if(this.form.paid_year > this.today)
              {
                this.invalidyear = `Year should be less than or equal to: ${this.today}`
                this.year_error = true
                return false
              }else if(this.form.paid_year.length < 4 )
              {
                this.invalidyear = `Enter correct year format example:  2019`
                this.year_error = true
                return false
              }
              this.loading = true
              axios.post("auth/dues", this.form).then( (response) =>{
                 this.errors = response.data.errors
                 this.loading = false
                 console.log(response.data)
              if(response.data.success)
               {
                //this.$router.replace({name: "admin"})
                 this.$noty.success("Payment made Successfully")
                 this.$router.push("/admin")
               }

              }).catch( (err) =>{
                 this.loading = false
              })
        },
        // getUser(){ axios.get(http://new-app.dev/api/auth/user/${this.$route.params.id}) }
    },
    //mounted: {
      // fire Api call to get your data
      // example  this.getUser()
    //}
}
</script>
<style scoped>

body{
  font-family: Arial, Helvetica, sans-serif
}
  
</style>