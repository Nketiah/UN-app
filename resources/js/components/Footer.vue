<template>
    <div>
        <footer class="footer mt-auto py-0 mt-40 font-sans bg-blue-brand text-white text-sm mt-64">
            <div class="container mx-auto py-2  flex justify-between items-center flex-col lg:flex-row">
                <div class="text-white mb-8 lg:mt-0">powered by step network &copy; {{ date.getFullYear() }}  <a href="https://snetgh.com"  target="_blank"  class="ml-10 heading-font hover:text-white"> https://snetgh.com</a>  </div>
                <ul class="flex items-center">
                    <li class="mr-8"> <a href="https://facebook.com" target="_blank" class="text-white hover:text-gray-400 outline-none focus:shadow-outline-blue inline-block"> <i class="social fab fa-facebook-f fa-2x"></i> </a> </li>
                    <li class="mr-8"> <a href="https://instagram.com" target="_blank" class="text-white hover:text-gray-400 outline-none focus:shadow-outline-blue inline-block"> <i class="social fab fa-instagram fa-2x"></i> </a>  </li>
                    <li class="mr-8"> <a href="https://twitter.com" target="_blank" class="text-white hover:text-gray-400 outline-none focus:shadow-outline-blue inline-block"> <i class="social fab fa-twitter fa-2x"></i>  </a> </li>
                </ul>
            </div>
       </footer>
    </div>
</template>

<script>
export default {
    name: "Footer",
    data(){
        return {
            date: new Date()
        }
    },

}
</script>

<style>
   footer {
    position: fixed;
    height: 70px;
    bottom: 0;
    width: 100%;
    background: #1C75BC;
    color: #fff;
    font-size: 14px;
}

.social:hover{
  cursor: pointer;
}

</style>