<template>
  <div id="page-about" class="page">
    <h2>About</h2>
    <section class="introduction">
      <h3>Introduction</h3>
      <p class="text">
        Huang Yi Kai. <br>
        He was born in Tainan in 1986. He lives in Taipei currently. Ever since remembered, he was strongly affected by his parents’ passion for taking pictures when he was young; thus, he acquires a habit of photography. After using film camera, he begins to learn to observe things in detail, to capture both the warmth of the fleeting scenes and the real scenes before his very eyes. In 2012 he formed “The Boy’s Holiday Committee” with two of his friends. In 2013 they published "Sakyoto daily day-off" with Kyoto scenes as the main topic. In 2015 they published "Douou daily-day off" with traveling to Sapporo as topic. While having extensive experience, he participates in many different activities increasingly. <img v-bind:src="require('@/assets/images/cross.svg')" width="12">
      </p>
    </section>
    <section class="contact">
      <h3>Contact & Social</h3>
      <ul>
        <li><a href="#" target="_blank">E-Mail</a></li>
        <li><a href="#" target="_blank">Facebook</a></li>
        <li><a href="#" target="_blank">Instagram</a></li>
      </ul>
    </section>
    <section class="offer">
      <h3>Offer for Work</h3>
      <p class="text">
        Logo Design, Corporation Identity Design,
        Brand Art Direction, Website Design <img v-bind:src="require('@/assets/images/cross.svg')" width="12">
      </p>
    </section>
    <Footer />
  </div>
</template>

<script>
import Footer from '../components/Footer.vue'

export default {
  name: 'About',
  components: {
    Footer
  },
  props: {
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

#page-about {

  .text {
    font-weight: 700;
    line-height: 1.715;
    margin: 0;
    @media (min-width: $screen-md) {
      width: 470px;
      font-size: 16px;
      line-height: 1.625;
    }
  }

  section {
    padding-top: 28px;
    opacity: 1;
    transform: translateX(0);
    transition: 1s cubic-bezier(0.25, 1, 0.5, 1);
    &.introduction {
      padding-top: 0;
      transition-delay: .1s;
      h3 {
        display: none;
      }
      .text {
        letter-spacing: $default-letter-spacing;
      }
    }
    &.contact {transition-delay: .2s;}
    &.offer {transition-delay: .3s;}
    @media (min-width: $screen-md) {
      padding-top: 47px;
    }
    h3 {
      margin: 0 0 8px;
      @media (min-width: $screen-md) {
        margin-bottom: 15px;
      }
    }
    ul {
      line-height: 1.715;
      li {
        margin-right: 20px;
        display: inline-block;
        @media (min-width: $screen-md) {
          margin-right: 30px;
        }
        a {
          position: relative;
          font-weight: 700;
          text-decoration: underline;
          letter-spacing: $default-letter-spacing;
          @media (min-width: $screen-md) {
            font-size: 16px;
          }
          &::after {
            display: none;
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 60px;
            height: 60px;
            background: url(../assets/images/slash.svg) center center no-repeat;
            background-size: contain;
            transform: translate(-50%, -50%);
          }
          @media not all and (hover: none) {
            &:hover::after {
              display: block;
            }
          }
        }
      }
    }
    .text {letter-spacing: 0;}
  }

  &.fade-enter-to,
  &.fade-leave-to {

    section {

      opacity: 0;
      transform: translateX(-50px);

    }

  }

}

</style>
