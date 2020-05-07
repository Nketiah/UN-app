<template>
     <div id="main">
        <Navbar/>
      <div class="content">
      <router-view></router-view>
        <vue-confirm-dialog></vue-confirm-dialog>
      </div>
     <Footer/>
     </div>
</template>

<script>

import Navbar from "../Navbar"
import Footer from "../Footer"

export default {
    name: "main-app",

    components: {
        Navbar,
        Footer
    },
}
</script>

<style >
    
</style>