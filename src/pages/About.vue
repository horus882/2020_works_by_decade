<template>
  <div id="page-about" class="page">
    <h2>About</h2>
    <section class="introduction">
      <h3>Introduction</h3>
      <p class="text">
        Huang Yi Kai.<br>
        The Taiwanese designer was born in Tainan in 1986 and currently resides in Taipei City. He has been with M’ORANGE, a digital consulting service, for ten years, ever since finishing school. He has worked with numerous clients, building a portfolio of a wide variety of projects and visual styles.   Responding to client needs and working within market limitations, Yi Kai constructs balanced solutions without compromising the intrinsic value of his designs. To meet the different challenges of various market trends and client requests, he provides services that include not only website design, but also graphic design, visual conceptualization, exhibit coordination, artistic direction, and more. <br>
        <br>
        He works with utmost insistence on authenticity, holding firm the belief that “good design” can change a society. Passing down tenets of good practices, he hopes to help shape design culture.<br>
        <br>
        His past clients included Nike, Adidas, New Balance, P&G, SK-II, Olay, Audi, kiânn, MUJI, KIRIN, Macro Maison, Pauian, Tefal, Darlie, Family Mart, Philips Air, YUAN, HeySong, Brand’s, KLIM, Kee Wah, Shinkong Life Foundation, etc. <img v-bind:src="require('@/assets/images/cross.svg')" width="12">
      </p>
    </section>
    <section class="contact">
      <h3>Contact & Social</h3>
      <ul>
        <li><a v-on:click="$trackEvent('E-mail', 'Click', 'About')" href="mailto:medennisk@gmail.com" target="_blank">E-Mail</a></li>
        <li><a v-on:click="$trackEvent('Facebook', 'Click', 'About')" href="https://www.facebook.com/deersummer/" target="_blank">Facebook</a></li>
        <li><a v-on:click="$trackEvent('Instagram', 'Click', 'About')" href="https://www.instagram.com/huangyikai.ig/" target="_blank">Instagram</a></li>
      </ul>
    </section>
    <section class="offer">
      <h3>Services Offered</h3>
      <p class="text">
        Logo Design, Typography Design,<br>
        Corporation Identity Design,<br>
        Brand Art Direction, Website Design <img v-bind:src="require('@/assets/images/cross.svg')" width="12">
<!--
        Logo Design, Corporation Identity Design,<br> 
        Brand Art Direction, Website Design <img v-bind:src="require('@/assets/images/cross.svg')" width="12">
-->
      </p>
    </section>
    <section class="credits">
      <h3>Special Thanks</h3>
      <p class="text">
        Website Developer : <a v-on:click="$trackEvent('Credits-Brent', 'Click', 'About')" href="https://www.facebook.com/horus882/" target="_blank">Brent Hsieh</a><br>
        English Translations : <a v-on:click="$trackEvent('Credits-Jolie', 'Click', 'About')" href="mailto:jcnthingsinfo@gmail.com" target="_blank">Jolie Chang Nicaretta</a>
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
    &.credits {transition-delay: .4s;}
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
    a { text-decoration: underline; }
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
