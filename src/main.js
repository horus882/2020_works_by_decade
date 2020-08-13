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
      component: Index,
      meta: {
        title: 'Index | Works by Decade'
      }
    },
    {
      path: '/about',
      name: 'About',
      component: About,
      meta: {
        title: 'About | Works by Decade'
      }
    },
    {
      // path: '/works',
      path: '/works/:id?',
      name: 'Works',
      component: Works,
      meta: {
        title: 'Works | Works by Decade'
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
