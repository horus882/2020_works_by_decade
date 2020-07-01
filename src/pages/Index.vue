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

  .background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #ccc;
    z-index: -1;
  }

}

</style>
