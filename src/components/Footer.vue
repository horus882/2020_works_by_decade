<template>
  <footer>
    <p class="copyright">Copyright &copy; {{ getCurrentYear() }} HuangYiKai. All rights reserved.</p>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  props: {
  },
  methods: {
    getCurrentYear() {
      return new Date().getFullYear();
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

footer {

  font-size: 12px;
  font-weight: 700;
  margin-top: 4.25em;

  @media (min-width: $screen-md) {
    font-size: 13px;
  }

}

</style>
