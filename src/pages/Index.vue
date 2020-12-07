<template>
  <div id="page-index" class="page">
    <div class="background" v-bind:style="{'background-image': 'url(' + require('@/assets/images/home/' + backgroundId + '.jpg') + ')'}"></div>
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
    this.backgroundId = (Math.floor(Math.random() * 7) + 1);
    console.log(this.backgroundId);
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
    background: url(../assets/images/home/1.jpg) center center no-repeat;
    background-size: cover;
    z-index: -1;
  }

}

</style>
