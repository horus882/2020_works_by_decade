<template>
  <div class="share">
    <a :href="href" target="_blank" v-on:click="$trackEvent('Share-' + $route.path, 'Click', 'Work')">Share</a>
    <!-- <a v-on:click="shareToFacebook">Share</a> -->
    <a v-clipboard:copy="link" v-clipboard:success="onCopy" v-clipboard:error="onError" v-on:click="$trackEvent('Copy-' + $route.path, 'Click', 'Work')">Copy Link</a>
  </div>
</template>

<script>
export default {
  name: 'Share',
  props: {
  },
  data() {
    return {
      href: null,
      link: null
    }
  },
  methods: {
    shareToFacebook: function() {
      console.log(this.link);
    },
    onCopy: function() {
      alert('Link copied.');
    },
    onError: function() {
      alert('Failed to copy link.');
    }
  },
  mounted() {
    this.link = location.href.split('?')[0].replace('work/', 'share/');
    this.href = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(this.link);
  }
}
</script>

<style lang="scss" scoped>

.share {
  padding-top: 9px;
  text-transform: lowercase;
  @media (min-width: $screen-md) {
    padding-top: 15px;
  }
  a {
    font-size: 12px;
    font-weight: 500;
    font-style: italic;
    text-decoration: underline;
    line-height: 26px;
    margin-right: 9px;
    @media (min-width: $screen-md) {
      font-size: 13px;
    }
  }
}

</style>
