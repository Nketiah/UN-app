
require('./bootstrap');
import Vue from "vue"
import router from './router'
import store from "./store"
import MainApp from "./components/pages/MainApp.vue"
import axios from "axios"
import VueNoty from 'vuejs-noty'
import VModal from 'vue-js-modal'
import VuejsDialog from 'vuejs-dialog';
import VueConfirmDialog from "vue-confirm-dialog";



import 'vuejs-dialog/dist/vuejs-dialog.min.css';
import 'vuejs-noty/dist/vuejs-noty.css'

Vue.use(VueNoty)
Vue.use(VueConfirmDialog);
Vue.use(VuejsDialog)
Vue.use(VModal)


require("./store/subscriber")
window.Vue = require('vue');

//http://new-app.dev/api

axios.defaults.baseURL = "https://unacwca.snetgh.com/api/"

store.dispatch('auth/attempt', localStorage.getItem('token')).then(() => {

new Vue({
    /* data: { auth:{} } */
    store,
    router,
    render: h => h(MainApp)
}).$mount("#app");

})
