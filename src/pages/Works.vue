<template>
  <div id="page-works" class="page">
    <h2 v-if="!this.$route.params.id">Works</h2>
    <h2 v-else><router-link to="/works">Works</router-link></h2>
    <transition name="fade">
      <ul class="list" v-if="!this.$route.params.id">
        <li v-for="(item, index) in portfolio" v-bind:key="index">
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
    </transition>
    <transition name="fade">
      <div class="detail" v-if="this.$route.params.id">
        <h3 class="title">{{ this.portfolio[this.$route.params.id - 1].name }} <span>({{ this.portfolio[this.$route.params.id - 1].year }})</span></h3>
        <div class="images">
          <img :src="this.portfolio[this.$route.params.id - 1].images[2]">
        </div>
        <div class="info">
          <p v-html="this.portfolio[this.$route.params.id - 1].info.replace(/→/g, '<i></i>')"></p>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: 'Works',
  props: {
  },
  data() {
    return {
      portfolio:    [
        {
          id:         1,
          name:       'New Balance 247',
          year:       2017,
          thumbnail:  'https://fakeimg.pl/400x400/',
          images:     [
            'https://fakeimg.pl/640x480/?text=NB-1',
            'https://fakeimg.pl/480x640/?text=NB-2',
            'https://fakeimg.pl/640x640/?text=NB-3'
          ],
          info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        },
        {
          id:         2,
          name:       'New Balance 247 Campaign',
          year:       2017,
          thumbnail:  'https://fakeimg.pl/400x400/',
          images:     [
            'https://fakeimg.pl/640x480/?text=NBC-1',
            'https://fakeimg.pl/480x640/?text=NBC-2',
            'https://fakeimg.pl/640x640/?text=NBC-3'
          ],
          info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        },
        {
          id:         3,
          name:       '與世界一起 Cheers！｜KIRIN 冰結旅途',
          year:       2018,
          thumbnail:  'https://fakeimg.pl/400x400/',
          images:     [
            'https://fakeimg.pl/640x480/?text=KTH-1',
            'https://fakeimg.pl/480x640/?text=KTH-2',
            'https://fakeimg.pl/640x640/?text=KTH-3'
          ],
          info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        },
        {
          id:         4,
          name:       'KIRIN Official Site',
          year:       2016,
          thumbnail:  'https://fakeimg.pl/400x400/',
          images:     [
            'https://fakeimg.pl/640x480/?text=KIRIN-1',
            'https://fakeimg.pl/480x640/?text=KIRIN-2',
            'https://fakeimg.pl/640x640/?text=KIRIN-3'
          ],
          info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        },
        {
          id:         5,
          name:       'XXX XXX XXX',
          year:       2016,
          thumbnail:  'https://fakeimg.pl/400x400/',
          images:     [
            'https://fakeimg.pl/640x480/?text=X-1',
            'https://fakeimg.pl/480x640/?text=X-2',
            'https://fakeimg.pl/640x640/?text=X-3'
          ],
          info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        },
      ]
    }
  },
  computed: {
    id() {
      return this.portfolio[this.$route.params.id - 1];
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
    font-size: 0;
    text-align: left;
    padding-top: 36px;
    padding-bottom: 75px;
    box-sizing: border-box;
    @media (min-width: $screen-md) { padding-top: 57px; }
    @media (min-width: $screen-lg) { max-width: 860px; }
    li {
      display: inline-block;
      width: 50%;
      font-size: 13px;
      vertical-align: top;
      margin-bottom: 20px;
      box-sizing: border-box;
      &:nth-of-type(odd) { padding-right: 10px; }
      &:nth-of-type(even) { padding-left: 10px; }
      @media (min-width: $screen-md) {
        margin-bottom: 50px;
        &:nth-of-type(odd) { padding-right: 30px; }
        &:nth-of-type(even) { padding-left: 30px; }
      }
      @media (min-width: $screen-lg) { max-width: 430px; }
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
  }

  .detail {

    position: absolute;
    padding-top: 6px;
    padding-bottom: 75px;

    h3 {
      font-size: 20px;
      margin: 0px 0 40px;
      line-height: 1.3;
      @media (min-width: $screen-md) {
        // position: absolute;
        // top: -32px;
        // left: 120px;
        font-size: 24px;
        margin: -38px 0 0 120px;
        padding-right: 150px;
      }
      &::after {content: none;}
      span {
        position: relative;
        top: 5px;
        font-size: 12px;
        vertical-align: top;
        @media (min-width: $screen-md) {top: 8px;}
      }
    }

    .images {
      @media (min-width: $screen-md) {margin-top: 60px;}
      img {
        display: block;
        width: 100%;
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

  }

}

</style>
