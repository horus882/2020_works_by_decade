<template>
  <div id="app">
    <div id="main"> <!-- v-bind:class="currentPage" -->

      <transition name="fade">
        <router-view></router-view>
      </transition>

      <transition name="fade">
        <Aside v-show="currentPage == 'index'" />
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
      currentPage: null
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

body {
  margin: 0;
  padding: 50px 30px;
  // background-color: #e5e5e5;
  @media (min-width: $screen-lg) {
    padding: 76px 80px;
  }
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
  &::after {
    content: '→';
    position: absolute;
    top: -8px;
    font-size: 24px;
    font-weight: 700;
    font-family: 'Jaldi';
    margin-left: 7px;
    vertical-align: top;
  }
}

#main {
  position: relative;
  @media (min-width: $screen-lg) {
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
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: auto;
  padding-bottom: 50px;
  box-sizing: border-box;
  @media (min-width: $screen-lg) {
    padding-right: 470px;
  }
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
