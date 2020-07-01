<template>
  <aside>
    <h1>
      <router-link to="/">Works<br>by Decade</router-link>
    </h1>
    <p class="description">
      The Protfolio in M’ORANGE<br>by Huang Yi Kai, 2010-2020
    </p>
    <nav>
      <ul>
        <li>
          <router-link to="/works">Works</router-link>
        </li>
        <li>
          <router-link to="/about">About</router-link>
        </li>
      </ul>
    </nav>
    <p class="text">
      Huang Yi Kai. <br>
      He was born in Tainan in 1986. He lives in Taipei currently. Ever since remembered, he was strongly affected by his parents’ passion for taking pictures when he was young; thus, he acquires a habit of photography. After using film camera, he begins to learn to observe things in detail, to capture both the warmth of the fleeting scenes and the real scenes before his very eyes. In 2012 he formed “The Boy’s Holiday Committee” with two of his friends. In 2013 they published "Sakyoto daily day-off" with Kyoto scenes as the main topic. In 2015 they published "Douou daily-day off" with traveling to Sapporo as topic. While having extensive experience, he participates in many different activities increasingly.
    </p>
  </aside>
</template>

<script>
export default {
  name: 'Aside',
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
  padding-bottom: 50px;

  h1 {
    font-size: 34px;
    line-height: 1.18;
  }

  .description {
    font-size: 16px;
    font-weight: 700;
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
        text-decoration: underline;
      }
    }
  }

  .text {
    font-weight: 700;
    line-height: 1.715;
    letter-spacing: 0.4px;
    margin: 0;
    // padding-right: 15px;
  }

}

</style>
