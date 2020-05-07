<template>
    <div>
         
 <div style="text-center">
     <div class="card mx-auto mt-32 py-8" style="width: 18rem;">
    <router-link to="/dashboard"  class="btn btn-sm">  <i class="fa fa-backward fa-1x"></i> Go home</router-link>
  <div class="card-body">
    <h5 class="card-title text-gray-600">Choose avatar for profile</h5>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
         <form enctype="multipart/form-data">
         <div class="custom-file">
        <input type="file" @change="imageSelected" class="custom-file-input" id="customFile">
            <small class="text-red-500" v-if="imagerror && imagerror.image"> {{ imagerror.image[0] }} </small>
        <label class="custom-file-label" for="customFile">Choose file</label>
     </div>
          <div v-if="imagepreview" class="mt-3 ml-5 rounded-full">
            <img :src="imagepreview"  class="figure-img img-fluid rounded" style="max-height:100px;" alt="">
          </div>
          <button class="btn btn-primary btn-block mt-3" @click.prevent="profileUpload"  :disabled="loading"  v-bind:class="{'opacity-50 cursor-not-allowed': loading}">
               <i class="fas fa-spin fa-spinner fa-2x" v-if="loading"></i>
              {{ loading ? '' : 'upload photo' }}
        </button>
    </form>
   </div>
  </div>
</div>
</div>
</template>

<script>
export default {

    data(){
        return{
           loading:false,
           imagerror:{},
           image:null,
           imagepreview:null,
        }
    },
      methods: {
        
        imageSelected(e){
          this.image = e.target.files[0];
          let reader = new FileReader();
          reader.readAsDataURL(this.image);
          reader.onload = e =>{
              this.imagepreview = e.target.result
          }
        },
        profileUpload(){
            this.loading = true
            let data = new FormData;
            data.append("image", this.image)
            //data.append("description", this.description)
             axios.post("auth/uploadphoto", data).then( (response) =>{
                this.imagerror = response.data.errors
                this.loading = false;
                console.log(response.data)
               if(response.data == "success"){
                 this.$noty.success("Photo saved!")
                 this.$router.push("/dashboard")
               }
             }).catch((error) =>{

             })
        }
      },
}
</script>