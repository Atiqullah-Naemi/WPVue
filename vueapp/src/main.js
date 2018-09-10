import Vue from 'vue'
import App from './App.vue'
window.$ = window.jQuery = require('jquery')
import 'bootstrap/dist/css/bootstrap.css'
import PopperJs from 'popper.js'
import Bootstrap from 'bootstrap'
import Header from './components/partials/Header'
import Excerpt from './components/posts/Excerpt'



Vue.component('main-header', Header)
Vue.component('post-excerpt', Excerpt)



new Vue({
  el: '#app',
  render: h => h(App)
})
