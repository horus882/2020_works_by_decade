<template>
  <div id="page-index" class="page">
    <div class="background"></div>
  </div>
</template>

<script>
export default {
  name: 'Index',
  props: {
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

#page-index {

  padding-bottom: 0;

  .background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url(https://www.huangyikai.com/uploads/915979824b4d1c64766028e906eda418.jpg) center center no-repeat;
    background-size: cover;
    z-index: -1;
  }

}

</style>
