import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../components/pages/Home'
import Login from '../components/pages/Login'
import Profile from '../components/pages/Profile'
import Register from '../components/pages/Register'
import Dashboard from '../components/pages/Dashboard'
import User from '../components/pages/User'
import Photo from "../components/pages/Photo"
import UserView from "../components/pages/UserView"
import CreateUser from "../components/pages/CreateUser"
import DuesView from "../components/pages/DuesView"


import Admin from "../components/dash/Admin"
import Dues from "../components/dash/Dues"
import NotFound from "../components/pages/NotFound"
import ForgotPassword from '../components/pages/ForgotPassword'
import ResetPassword from '../components/pages/ResetPassword'
import ChangePassword from '../components/pages/ChangePassword'



import store from "../store"

Vue.use(VueRouter)

const routes = [

    {
        path: "*",
        component: NotFound
    },
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: "/register",
        component: Register,
        name: "register"
    },
    {
        path: "/forgot-password",
        component: ForgotPassword,
        name: "forgotpassword"
    },
    {
        path: "/reset-password",
        component: ResetPassword,
        name: "resetpassword"
    },

    {
        path: "/changepassword",
        component: ChangePassword,
        name: "changepassword",
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }
    },

    {
        path: "/admin",
        component: Admin,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }
       
    },
    {
        path: "/user-details/:id",
        component: UserView,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }

    },

    {
        path: "/add-dues/:id",
        component: Dues,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }
    },
    {
        path: "/update-profile",
        component: Profile,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }
    },
    {
        path: "/dues-history",
        component: DuesView,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }
    },

    {
        path: "/update-user",
        component: User,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }
    },
    {
        path: "/create-user",
        component: CreateUser,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }
    },



    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,

        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }

    },
    {
        path: '/photo',
        name: 'photo',
        component: Photo,

        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next({
                    name: 'login'
                })
            }
            next()
        }

    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
