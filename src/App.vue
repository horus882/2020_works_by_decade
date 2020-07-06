<template>
  <div id="app" v-bind:class="{'light': mode.light}">
    <div id="main" v-bind:class="currentPage"> <!-- v-bind:class="currentPage" -->

      <transition name="fade">
        <router-view></router-view>
      </transition>

      <transition name="fade">
        <Aside v-show="currentPage == 'index'" />
      </transition>

      <transition name="fade">
        <router-link v-show="currentPage != 'index'" to="/" class="back text-hide" title="Back to Home">Home</router-link>
      </transition>

    </div>
  </div>
</template>

<script>
import Aside from './components/Aside.vue'

export default {
  name: 'App',
  components: {
    Aside
  },
  data() {
    return {
      mode: { light: true },
      currentPage:  null
    }
  },
  // computed: {
  //   currentRouteName() {
  //     return this.$route.name;
  //   }
  // },
  methods: {
    checkCurrentPage() {
      this.currentPage = this.$route.name.toLowerCase();
      // this.currentPage = this.$route.name;
      // console.log(this.$route);
    }
  },
  mounted() {
    this.checkCurrentPage();
  },
  watch: {
    $route() { // to, from
      // console.log('to: ' + to.name);
      // console.log('from: ' + from.name);
      this.checkCurrentPage();
    }
  }
}
</script>

<style lang="scss">

// @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Jaldi:wght@400;700&family=Noto+Serif:wght@400;700&display=swap');
@import url('https://fonts.googleapis.com/earlyaccess/notosanstc.css');

#app {
  color: #000;
  font-size: 14px;
  font-family: 'Noto Serif', 'sourcehansans-tc', 'Noto Sans S Chinese', 'Noto Sans TC', 'PingFang TC', 'Microsoft JhengHei', Tahoma, Verdana, Arial, Helvetica, sans-serif;
  font-weight: 400;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

html {overflow-y: scroll;}

body {
  margin: 0;
  padding: 75px 30px;
  // background-color: #e5e5e5;
  // @media (min-width: $screen-md) { padding: 73px 80px; }
  @media (min-width: $screen-md) { padding: 76px 80px; }
}

a, a:hover {
  color: $primary-color;
  text-decoration: none;
}

ul, li {
  margin: 0;
  padding-left: 0;
  list-style: none;
}

h1 {
  margin: 0;
}

h2 {
  position: relative;
  font-size: 20px;
  margin: 0 0 30px;
  @media (min-width: $screen-md) {
    font-size: 24px;
    margin-bottom: 50px;
  }
  &::after {
    content: '';
    position: absolute;
    top: 7px;
    width: 16px;
    height: 12px;
    margin-left: 8px;
    background: url(./assets/images/arrow.svg) center center no-repeat;
    background-size: contain;
    @media (min-width: $screen-md) {
      top: 5px;
      width: 19px;
      height: 24px;
      margin-left: 11px;
    }
  }
}

h3 {
  position: relative;
  font-size: 14px;
  letter-spacing: $default-letter-spacing;
  @media (min-width: $screen-md) {
    font-size: 16px;
  }
  &::after {
    content: '';
    position: absolute;
    top: 6px;
    width: 11px;
    height: 8px;
    margin-left: 5px;
    background: url(./assets/images/arrow.svg) center center no-repeat;
    background-size: contain;
    @media (min-width: $screen-md) {
      top: -1px;
      width: 13px;
      height: 24px;
      margin-left: 7px;
    }
  }
}

#main {
  position: relative;
  @media (min-width: $screen-lg) {
    padding-right: 470px;
    aside {
      display: block!important;
      opacity: 1!important;
      width: 360px;
      right: 0;
      left: auto;
    }
  }
  // padding: 50px 30px;
  // aside { display: none; }
  // &.index aside { display: block; }
}

.page {
  // position: absolute;
  position: relative;
  top: 0;
  left: 0;
  width: 100%;
  height: auto;
  padding-bottom: 75px;
  box-sizing: border-box;
  // @media (min-width: $screen-lg) {
  //   padding-right: 470px;
  // }
}

.back {
  position: fixed;
  top: 30px;
  right: 24px;
  width: 30px;
  height: 30px;
  background: url(./assets/images/cross.svg) center center no-repeat;
  background-size: contain;
  @media (min-width: $screen-md) {
    top: 60px;
    right: 70px;
    width: 50px;
    height: 50px;
  }
  @media (min-width: $screen-lg) {
    display: none;
  }
}

.text-hide {
  font-size: 0;
  text-indent: -5000px;
}

.fade-enter-active, .fade-leave-active {
  transition-property: opacity;
  transition-duration: .75s;
}

.fade-enter-active {
  transition-delay: .75s;
}

.fade-enter, .fade-leave-active {
  opacity: 0
}

</style>
