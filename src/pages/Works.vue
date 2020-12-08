<template>
  <div id="page-works" class="page">
    <h2 v-if="!this.$route.params.id">Works</h2>
    <h2 v-else><router-link to="/works">Works</router-link></h2>
    <transition name="fade">
      <div class="list" v-if="!this.$route.params.id">
        <ul>
          <li v-for="(item, index) in portfolio" v-bind:key="index" v-bind:style="{'transition-delay': (0.1 * index) + 's'}">
            <router-link :to="{ name: 'Works', params: { id: item.id } }">
              <div class="thumbnail">
                <img :src="item.thumbnail">
              </div>
              <div class="info">
                <p class="name">{{ item.name }}</p>
                <p class="year">({{ item.year }})</p>
              </div>
            </router-link>
          </li>
        </ul>
        <Footer />
      </div>
    </transition>
    <transition name="fade">
      <div class="detail" v-if="this.$route.params.id">
        <div class="head">
          <h3 class="title">{{ this.portfolio[this.$route.params.id - 1].name }} <span>({{ this.portfolio[this.$route.params.id - 1].year }})</span></h3>
          <p class="type">{{ this.portfolio[this.$route.params.id - 1].type }}</p>
        </div>
        <div class="media">
          <div v-for="(item, index) in this.portfolio[this.$route.params.id - 1].media" v-bind:key="index">
            <img v-if="/[\/.](gif|jpg|jpeg|tiff|png)$/g.test(item)" :src="getImageUrl('images/works/' + $data.portfolio[getCurrentId()].folder + '/' + item)">
            <div class="embed" v-html="item" v-else></div>
          </div>
          <!-- <img :src="this.portfolio[this.$route.params.id - 1].images[2]"> -->
        </div>
        <div class="info">
          <p v-html="this.portfolio[this.$route.params.id - 1].info.replace(/→/g, '<i></i>')"></p>
        </div>
        <Footer />
      </div>
    </transition>
  </div>
</template>

<script>
import Footer from '../components/Footer.vue'

export default {
  name: 'Works',
  components: {
    Footer
  },
  props: {
  },
  data() {
    return {
      portfolio:    [
        {
          id:         1,
          name:       'Nike Free',
          year:       2011,
          type:       'Graphic Design / Hand Write / Photography',
          thumbnail:  'https://fakeimg.pl/400x400/',
          folder:     'sample',
          media:      ['loading.gif', '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg'],
          info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        },
        {
          id:         2,
          name:       'kiann',
          year:       2019,
          type:       'Graphic Design / Hand Write / Photography',
          thumbnail:  'https://fakeimg.pl/400x400/',
          folder:     'kiann',
          media:      [
            '<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/487718203?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div>',
            '2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg','19.jpg','20.jpg','21.jpg'
          ],
          info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        },
        // {
        //   id:         3,
        //   name:       '與世界一起 Cheers！｜KIRIN 冰結旅途',
        //   year:       2018,
        //   type:       'Graphic Design / Hand Write / Photography',
        //   thumbnail:  'https://fakeimg.pl/400x400/',
        //   images:     [
        //     'https://fakeimg.pl/1200x760/?text=KTH-1',
        //     'https://fakeimg.pl/760x1200/?text=KTH-2',
        //     'https://fakeimg.pl/940x940/?text=KTH-3'
        //   ],
        //   info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        // },
        // {
        //   id:         4,
        //   name:       'KIRIN Official Site',
        //   year:       2016,
        //   type:       'Graphic Design / Hand Write / Photography',
        //   thumbnail:  'https://fakeimg.pl/400x400/',
        //   images:     [
        //     'https://fakeimg.pl/1200x760/?text=KIRIN-1',
        //     'https://fakeimg.pl/760x1200/?text=KIRIN-2',
        //     'https://fakeimg.pl/940x940/?text=KIRIN-3'
        //   ],
        //   info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        // },
        // {
        //   id:         5,
        //   name:       'XXX XXX XXX',
        //   year:       2016,
        //   type:       'Graphic Design / Hand Write / Photography',
        //   thumbnail:  'https://fakeimg.pl/400x400/',
        //   images:     [
        //     'https://fakeimg.pl/1200x760/?text=X-1',
        //     'https://fakeimg.pl/760x1200/?text=X-2',
        //     'https://fakeimg.pl/940x940/?text=X-3'
        //   ],
        //   info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        // },
      ]
    }
  },
  computed: {
    id() {
      return this.portfolio[this.$route.params.id - 1];
    }
  },
  methods: {
    getImageUrl(source) {
      return require('../assets/' + source);
    },
    getCurrentId() {
      return this.$route.params.id - 1;
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">

#page-works {

  h2 {
    margin-bottom: 0;
    a {
      text-decoration: underline;
    }
  }

  .list {
    position: absolute;
    width: 100%;
    text-align: left;
    padding-top: 36px;
    padding-bottom: 75px;
    box-sizing: border-box;
    @media (min-width: $screen-md) { padding-top: 57px; }
    @media (min-width: $screen-lg) { max-width: 860px; }
    @media (min-width: $screen-2xl) { max-width: 1320px; }
    ul {
      font-size: 0;
      margin: 0 -10px;
      @media (min-width: $screen-md) {
        margin: 0 -30px;
      }
    }
    li {
      display: inline-block;
      width: 50%;
      font-size: 13px;
      vertical-align: top;
      margin-bottom: 20px;
      box-sizing: border-box;
      padding: 0 10px;
      opacity: 1;
      transform: scale(1);
      transition: 1s cubic-bezier(0.25, 1, 0.5, 1);
      // &:nth-of-type(odd) { padding-right: 10px; }
      // &:nth-of-type(even) { padding-left: 10px; }
      @media (min-width: $screen-md) {
        padding: 0 30px;
        margin-bottom: 50px;
        // &:nth-of-type(odd) { padding-right: 30px; }
        // &:nth-of-type(even) { padding-left: 30px; }
      }
      @media (min-width: $screen-lg) { max-width: 460px; }
      a { display: block }
      .thumbnail {
        position: relative;
        img {
          display: block;
          width: 100%;
        }
        &::after {
          display: none;
          content: '';
          position: absolute;
          top: 50%;
          left: 50%;
          width: 50%;
          height: 50%;
          background: url(../assets/images/slash.svg) center center no-repeat;
          background-size: contain;
          transform: translate(-50%, -50%);
        }
      }
      @media not all and (hover: none) {
        a:hover .thumbnail {
            &::after {
              display: block;
            }
        }
      }
      .info {
        padding: 0 10px;
        @media (min-width: $screen-md) {padding: 0 20px;}
        p {
          margin: 0;
        }
        .name {
          font-size: 13px;
          font-weight: 700;
          padding-top: 6px;
          padding-bottom: 2px;
          @media (min-width: $screen-md) { font-size: 16px; padding-top: 12px; }
        }
        .year {
          font-size: 12px;
          font-weight: 700;
          padding-bottom: 5px;
          transform-origin: left center;
          transform: scale(0.83);
          @media (min-width: $screen-md) { font-size: 13px; transform: none; }
        }
      }
    }
    // &.fade-enter-to,
    // &.fade-leave-to {

    //   li {
    //     opacity: 0;
    //     transform: scale(0.5);
    //   }

    // }
    footer {
      margin-top: 3em;
      @media (min-width: $screen-md) {
        margin-top: 1em;
      }
    }
  }

  &.fade-enter-to,
  &.fade-leave-to {

    .list {

      li {
        opacity: 0;
        transform: scale(0.65);
      }

    }

  }

  .detail {

    position: absolute;
    padding-top: 6px;
    padding-bottom: 75px;

    .head {
      margin-bottom: 40px;
      // overflow: hidden;
      @media (min-width: $screen-md) {
        margin: -38px 0 0 120px;
        padding-right: 130px;
      }
      h3 {
        font-size: 20px;
        margin: 0;
        // margin: 0px 0 40px;
        line-height: 1.3;
        opacity: 1;
        transform: translateX(0);
        transition: 1s cubic-bezier(0.25, 1, 0.5, 1) .75s;
        @media (min-width: $screen-md) {
          font-size: 24px;
        }
        &::after {content: none;}
      }
      span {
        position: relative;
        top: 5px;
        font-size: 12px;
        vertical-align: top;
        @media (min-width: $screen-md) {top: 8px;}
      }
      .type {
        font-size: 13px;
        font-weight: 700;
        margin: 7px 0 0;
        opacity: 1;
        transform: translateX(0);
        transition: 1s cubic-bezier(0.25, 1, 0.5, 1) .85s;
        @media (min-width: $screen-md) {
          font-size: 16px;
          margin: 14px 0 0;
        }
      }
    }

    &.fade-enter,
    &.fade-leave-to {

      .head {

        h3, .type {
          opacity: 0;
          transform: translateX(-25px);
        }

      }

    }

    .media {
      @media (min-width: $screen-md) {margin-top: 60px;}
      img {
        display: block;
        width: 100%;
        image-rendering: -webkit-optimize-contrast;
        // margin-bottom: 15px;
      }
    }

    .info {
      font-size: 13px;
      font-weight: 700;
      line-height: 1.715;
      padding: 10px;
      @media (min-width: $screen-md) {
        font-size: 16px;
        padding: 14px 20px;
      }
      p {margin: 0;}
      i {
        display: inline-block;
        width: 11px;
        height: 24px;
        // line-height: 1.715;
        line-height: 24px;
        vertical-align: top;
        margin: 0 2px;
        background: url(../assets/images/arrow.svg) center center no-repeat;
        background-size: contain;
        @media (min-width: $screen-md) {
          width: 15px;
          height: 24px;
          margin: 0 5px;
        }
      }
    }

    footer {
      // padding-left: 10px;
      @media (min-width: $screen-md) {
        padding-left: 20px;
      }
    }

  }

}

</style>
