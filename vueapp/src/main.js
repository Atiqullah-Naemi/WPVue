import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'
window.$ = window.jQuery = require('jquery')
import 'bootstrap/dist/css/bootstrap.css'
import PopperJs from 'popper.js'
import Bootstrap from 'bootstrap'
import VueContentPlaceholders from 'vue-content-placeholders'
import { routes } from './routes'
import Header from './components/partials/Header'
import Footer from './components/partials/Footer'
import Excerpt from './components/posts/Excerpt'




Vue.use(VueRouter)
const router  =  new VueRouter({
    routes:      routes,
    mode:        'history',
    base:        '/wpvue/'
})



Vue.use(VueContentPlaceholders)
Vue.component('main-header', Header)
Vue.component('main-footer', Footer)
Vue.component('post-excerpt', Excerpt)



new Vue({
  el: '#app',
  router: router,
  render: h => h(App)
})
