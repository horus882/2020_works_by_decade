<template>
  <div id="page-index" class="page">
    <!--
    <div class="background-desktop" v-bind:style="{'background-image': 'url(' + require('@/assets/images/home/desktop-' + backgroundId + '.jpg') + ')'}"></div>
    <div class="background-mobile" v-bind:style="{'background-image': 'url(' + require('@/assets/images/home/mobile-' + backgroundId + '.jpg') + ')'}"></div>
    -->
    <div class="background">
      <div class="background-desktop" v-lazy:background-image="require('@/assets/images/home/desktop-' + backgroundId + '.jpg')"></div>
      <div class="background-mobile" v-lazy:background-image="require('@/assets/images/home/mobile-' + backgroundId + '.jpg')"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Index',
  props: {
  },
  data() {
    return {
      backgroundId: 1
    }
  },
  mounted() {
    this.backgroundId = (Math.floor(Math.random() * 8) + 1);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">

html {height: 100vh;}

#page-index {

  padding-bottom: 0;

  .background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    height: calc(var(--vh, 1vh) * 100);
    min-height: 100%;
    background-color: #000;
    z-index: -1;
    &-desktop,
    &-mobile {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #000;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      transition: opacity .3s;
      &[lazy=loading] {
        opacity: 0;
      }
      &[lazy=loaded] {
        opacity: 1;
      }
    }
  }

  // .background-desktop,
  // .background-mobile {
  //   position: fixed;
  //   top: 0;
  //   left: 0;
  //   width: 100%;
  //   // height: 100%;
  //   height: 100vh;
  //   height: calc(var(--vh, 1vh) * 100);
  //   min-height: 100%;
  //   // background: url(../assets/images/home/desktop-1.jpg) #000 center center no-repeat;
  //   background-color: #000;
  //   background-position: center center;
  //   background-repeat: no-repeat;
  //   background-size: cover;
  //   z-index: -1;
  //   transition: opacity .3s;
  //   &[lazy=loading] {
  //     opacity: 0;
  //   }
  //   &[lazy=loaded] {
  //     opacity: 1;
  //   }
  // }

  .background-desktop {
    display: none;
    @media (min-width: $screen-lg) {
      display: block;
    }
  }

  .background-mobile {
    transform: translate3d(0, 0, 0);
    background-image: url(../assets/images/home/mobile-1.jpg);
    @media (min-width: $screen-lg) {
      display: none;
    }
  }

}

</style>
