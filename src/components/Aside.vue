<template>
  <aside id="sidebar">
    <h1>
      <router-link to="/">Work of a <br>Decade</router-link>
    </h1>
    <p class="description">
      Portfolio of HUANG YI KAI <br>
      at M’ORANGE, 2010-2020
    </p>
    <nav>
      <ul>
        <li>
          <router-link to="/work">Work</router-link>
        </li>
        <li>
          <router-link to="/about">About</router-link>
        </li>
      </ul>
    </nav>
    <p class="text">
      Huang Yi Kai.<br>
      <br>
      The Taiwanese designer was born in Tainan in 1968 and currently resides in Taipei City. He has been with M’ORANGE, a digital consulting service, for ten years, ever since finishing school. He has worked with numerous clients, building a portfolio of a wide variety of projects and visual styles. He works with uncompromising insistence on authenticity, holding firm the belief that “good design” can change a society. Passing down tenets of good practices, he hopes to help shape design culture. <img v-bind:src="require('@/assets/images/cross.svg')" width="12">
      <!-- Huang Yi Kai. <br>
      He was born in Tainan in 1986. He lives in Taipei currently. Ever since remembered, he was strongly affected by his parents’ passion for taking pictures when he was young; thus, he acquires a habit of photography. After using film camera, he begins to learn to observe things in detail, to capture both the warmth of the fleeting scenes and the real scenes before his very eyes. In 2012 he formed “The Boy’s Holiday Committee” with two of his friends. In 2013 they published "Sakyoto daily day-off" with Kyoto scenes as the main topic. In 2015 they published "Douou daily-day off" with traveling to Sapporo as topic. While having extensive experience, he participates in many different activities increasingly. <img v-bind:src="require('@/assets/images/cross.svg')" width="12"> -->
    </p>
    <Footer />
  </aside>
</template>

<script>
import Footer from '../components/Footer.vue'

export default {
  name: 'Aside',
  components: {
    Footer
  },
  props: {
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

aside {
  
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: auto;
  padding-bottom: 75px;

  @media (min-width: $screen-lg) {
    position: relative;
    top: auto;
    bottom: 0;
  }

  &::before {
    content: '';
    position: absolute;
    top: -23px;
    left: 120px;
    width: 190px;
    height: 190px;
    background: url(../assets/images/cross.svg) center center no-repeat;
    background-size: contain;
  }

  a, p {
    transition: color 1s ease-out .25s;
  }

  h1 {
    position: relative;
    font-size: 34px;
    line-height: 1.18;
  }

  .description {
    position: relative;
    font-size: 16px;
    font-weight: 700;
    letter-spacing: $default-letter-spacing;
    margin: 18px 0 48px 0;
  }

  nav {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 53px;
    li {
      display: inline-block;
      vertical-align: top;
      margin-right: 30px;
      a {
        position: relative;
        text-decoration: underline;
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

  .text {
    font-weight: 700;
    line-height: 1.715;
    letter-spacing: $default-letter-spacing;
    margin: 0;
    // padding-right: 15px;
    @media (min-width: $screen-md) {
      width: 368px;
      font-size: 16px;
      line-height: 1.625;
    }
  }

}

.light .index aside {
  a, p, footer {
    color: $light-color;
  }
}

// #main.index aside {
//   position: relative;
//   padding-bottom: 0;
// }

</style>
