import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import VueAnime from './vue-anime';
Vue.use(VueAnime);

import Index from './pages/Index'
import About from './pages/About'
import Work from './pages/Work'

Vue.use(VueRouter)

Vue.config.productionTip = false

const router = new VueRouter({
  mode: 'history',
  base: '/work10',
  routes: [
    {
      path: '/',     
      name: 'Index',
      component: Index,
      meta: {
        title: 'Index | Work of a Decade'
      }
    },
    {
      path: '/about',
      name: 'About',
      component: About,
      meta: {
        title: 'About | Work of a Decade'
      }
    },
    {
      path: '/work/:id?',
      name: 'Work',
      component: Work,
      meta: {
        title: 'Work | Work of a Decade'
      }
      // params: true
    }
    // { path: '/', redirect: '/about' }
  ]
})

router.beforeEach((to, from, next) => {
  if (to.meta.title) {
    document.title = to.meta.title
  }
  next();
})

new Vue({
  router,
  el: '#app',
  render: h => h(App),
}).$mount('#app')
