import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import VueAnime from './vue-anime';
Vue.use(VueAnime);

import VueLazyload from 'vue-lazyload'
Vue.use(VueLazyload)

import VueGtag from "vue-gtag";

// import { plugin as OnLoad } from 'vue-onload'
// Vue.use(OnLoad);

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

Vue.use(VueGtag, {
  config: { 
    id: "UA-188863189-1",
    params: {
      send_page_view: false
    }
  }
}, router);

Vue.prototype.$trackPage = function(pageName) {
  this.$gtag.pageview({
    page_path: '/' + pageName,
  })
}

Vue.prototype.$trackEvent = function(category, action, label) {
  this.$gtag.event(action, {
    'event_category': category,
    'event_label': label
  })
}

new Vue({
  router,
  el: '#app',
  render: h => h(App),
}).$mount('#app')
