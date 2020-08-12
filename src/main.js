import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import VueAnime from './vue-anime';
Vue.use(VueAnime);

import Index from './pages/Index'
import About from './pages/About'
import Works from './pages/Works'

Vue.use(VueRouter)

Vue.config.productionTip = false

const router = new VueRouter({
  routes: [
    {
      path: '/',     
      name: 'Index',
      component: Index
    },
    {
      path: '/about',
      name: 'About',
      component: About
    },
    {
      // path: '/works',
      path: '/works/:id?',
      name: 'Works',
      component: Works,
      // params: true
    }
    // { path: '/', redirect: '/about' }
  ]
})

new Vue({
  router,
  el: '#app',
  render: h => h(App),
}).$mount('#app')
