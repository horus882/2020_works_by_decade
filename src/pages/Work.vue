<template>
  <div id="page-works" class="page">
    <h2 v-if="!this.$route.params.id">Work</h2>
    <h2 v-else><router-link to="/work">Work</router-link></h2>
    <transition name="fade">
      <div class="list" v-if="!this.$route.params.id">
        <ul>
          <li v-for="(item, index) in portfolio" v-bind:key="index" v-bind:style="{'transition-delay': (0.1 * index) + 's'}">
            <router-link :to="{ name: 'Work', params: { id: item.id } }" :data-id="item.id" :data-year="item.year" :data-name="item.name" v-on:click.native="$trackEvent(item.name, 'Click', 'Work')">
              <div :class="{loading: !item.thumbnail.loaded}" class="thumbnail">
                <!-- <img :src="item.thumbnail.src" v-on:load="thumbnailLoaded(item.id)"> -->
                <img v-lazy="getImageUrl('images/work/' + item.folder + '/cover.jpg')" :data-id="item.id">
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
          <h3 class="title">{{ getCurrentWork('name') }} <span>({{ getCurrentWork('year') }})</span></h3>
          <p class="type">{{ getCurrentWork('type') }}</p>
          <Share />
        </div>
        <div class="media">
          <div v-for="(item, index) in getCurrentWork('media')" v-bind:key="index">
            <img v-if="/[\/.](gif|jpg|jpeg|tiff|png)$/g.test(item)" v-lazy="getImageUrl('images/work/' + getCurrentWork('folder') + '/' + item)">
            <div class="embed" v-html="item" v-else></div>
          </div>
        </div>
        <div class="info">
          <p v-html="getCurrentWork('info').replace(/:/g, '<i></i>')"></p>
          <Share />
        </div>
        <Footer />
      </div>
    </transition>
  </div>
</template>

<script>
import Footer from '../components/Footer.vue'
import Share from '../components/Share.vue'

export default {
  name: 'Work',
  components: {
    Footer,
    Share
  },
  props: {
  },
  data() {
    return {
      portfolio:    [
        {
          id:         1,
          name:       'Kiânn Official Site',
          year:       2020,
          type:       'Official Site',
          thumbnail:  { loaded: false },
          folder:     '2020_kiann_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg'],
          info:       'Client : Starlux Airlines<br>Agency : M’ORANGE<br>Editorial Director : Melody Kao / Estate Media<br>Design Executive Director : Mong Lee<br>Project Manager : Kevin Chen, Welson Hsiao<br>Website Designer : Huang Yi Kai<br>Developer : Clouder Wang, Leo Lin, Brent Hsieh'
        },
        {
          id:         2,
          name:       'Kiânn Official Site Intro : Let’s Kiânn',
          year:       2020,
          type:       'Concept / Art & Graphic / Storyboard / Motionboard',
          thumbnail:  { loaded: false },
          folder:     '2020_kiann_02',
          media:      ['<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/487718203?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>','02.jpg','03.jpg','04.jpg','05.gif','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg','19.jpg','20.jpg','21.jpg','22.jpg','23.jpg','24.jpg'],
          info:       'Client : Starlux Airlines<br>Agency : M’ORANGE<br>Editorial Director : Melody Kao / Estate Media<br>Design Executive Director : Mong Lee<br>Concept : Huang Yi Kai<br>Art & Graphic : Huang Yi Kai<br>Storyboard : Huang Yi Kai<br>Motionboard : Huang Yi Kai<br>Animation Director : Tubo Lee<br>Project Manager : Akasha Wu<br>Cel animation : Szyu Pan<br>Motion Design : Tubo Lee / Toastwo Creative<br>Music & Sound Design : Co-op Works'
        },
        {
          id:         26,
          name:       'Kirin Ichi-Ban Beer Social Media Post',
          year:       2020,
          type:       '(Jan.-Dec., 2020) Graphic / Calligraphy / Handwriting',
          thumbnail:  { loaded: false },
          folder:     '2020_kirin_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Sinia Peng, Judy Lin, Alvin Luo<br>Creative : Pulan Chen, Eva Wu, Angie Chang<br>Designer : Huang Yi Kai<br>Photography : Maxi Ho Photography Studio<br>Photography Specialist : Ethan Wang'
        },
        {
          id:         3,
          name:       'Tefal New Gourmet Wave Key Visual',
          year:       2019,
          type:       'Key Visual / Typography',
          thumbnail:  { loaded: false },
          folder:     '2019_tefal_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg'],
          info:       'Client : Tefal Taiwan<br>Agency : M’ORANGE<br>Project Manager : Sinia Peng, Elena Hu<br>Key Visual Designer : Huang Yi Kai<br>Website Designer : Aju Tsai<br>Developer : Clouder Wang, Leo Lin'
        },
        {
          id:         4,
          name:       'Yuan Launch Campaign',
          year:       2019,
          type:       '(Proposed Design) Website',
          thumbnail:  { loaded: false },
          folder:     '2019_yuan_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg'],
          info:       'Client : Yuan<br>Agency : M’ORANGE<br>Project Manager : Jessy Ho, Erik Huang<br>Creative : Jacky Wen, Muji Lin, Zoi Hung<br>Designer : Huang Yi Kai'
        },
        {
          id:         5,
          name:       'M’ORANGE Annual Briefing Key Visual',
          year:       2019,
          type:       'Graphic',
          thumbnail:  { loaded: false },
          folder:     '2019_morange_01',
          media:      ['01.jpg','02.jpg','03.gif'],
          info:       'Agency : M’ORANGE<br>Creative : Jacky Wen<br>Designer : Huang Yi Kai<br>Animation Design : Eia Hung<br>Project Specialist : Kate Lin'
        },
        {
          id:         6,
          name:       'M’ORANGE Christmas Greeting Card',
          year:       2019,
          type:       'Graphic / Photography / Handwriting',
          thumbnail:  { loaded: false },
          folder:     '2019_morange_02',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg'],
          info:       'Agency : M’ORANGE<br>Creative : Jacky Wen<br>Designer : Huang Yi Kai<br>Project Specialist : Kate Lin<br>Model : Naomi Hsieh<br>Project Specialist : Kate Lin'
        },
        {
          id:         7,
          name:       'Kirin Hyoketsu Landing Page',
          year:       2018,
          type:       'Website',
          thumbnail:  { loaded: false },
          folder:     '2018_kirin_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Kevin Chen, Judy Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Shine Cheng'
        },
        {
          id:         8,
          name:       'Kirin Travel Hyoketsu Campaign',
          year:       2018,
          type:       'Website / Graphic / Typography / Handwriting',
          thumbnail:  { loaded: false },
          folder:     '2018_kirin_02',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Kevin Chen, Judy Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Brent Hsieh'
        },
        {
          id:         9,
          name:       'Kirin Gogotea Photography',
          year:       2018,
          type:       'Photography / Handwriting',
          thumbnail:  { loaded: false },
          folder:     '2018_kirin_03',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Photographer : Huang Yi Kai<br>Hand Writing : Huang Yi Kai<br>Model : Stephanie Su, Urania Chiu'
        },
        {
          id:         10,
          name:       'New Balance Campus Relay Campaign',
          year:       2018,
          type:       '(Proposed Design) Key Visual Mockup / Typography / Package',
          thumbnail:  { loaded: false },
          folder:     '2018_nb_01',
          media:      ['01.jpg','02.jpg','03.gif','04.jpg','05.jpg','06.jpg'],
          info:       'Client : New Balance Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih, Jessy Ho, Erik Huang<br>Creative : Jacky Wen, Muji Lin, Zoi Hung<br>Designer : Huang Yi Kai'
        },
        {
          id:         11,
          name:       'New Balance Campus Relay Campaign',
          year:       2017,
          type:       'Website / Typography',
          thumbnail:  { loaded: false },
          folder:     '2017_nb_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','<div style="padding:42.12% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/503421892?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg'],
          info:       'Client : New Balance Taiwan<br>Agency : M’ORANGE<br>Project Manager : Jessy Ho, Elaine Lin<br>Creative : Jacky Wen, Muji Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Brent Hsieh, Eia Hung<br>Public Relations : Monica Chen, Flora Huang<br>Project Specialist : Kate Lin<br>Production Studio : Lion Flying Production'
        },
        {
          id:         12,
          name:       'New Balance Official Site',
          year:       2017,
          type:       'Official Site',
          thumbnail:  { loaded: false },
          folder:     '2017_nb_02',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg'],
          info:       'Client : New Balance Taiwan<br>Agency : M’ORANGE<br>Project Manager : Kevin Chen, Judy Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Shine Cheng'
        },
        {
          id:         13,
          name:       'New Balance 247 Campaign',
          year:       2017,
          type:       'Website / Handwriting / Typography / OOH / Element / Event Materials / Printed Materials',
          thumbnail:  { loaded: false },
          folder:     '2017_nb_03',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.gif','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg'],
          info:       'Client : New Balance Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih, Jessy Ho, Jason Lin<br>Creative : Jacky Wen, Muji Lin, Pika Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Eia Hung<br>OOH Modeling Designer : Lackers Lee<br>Project Specialist : Kate Lin<br>Photographer : Rooster Chen'
        },
        {
          id:         14,
          name:       'MUJI Skin Care Campaign',
          year:       2017,
          type:       'Website / Illustration',
          thumbnail:  { loaded: false },
          folder:     '2017_muji_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg'],
          info:       'Client : MUJI Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih, Jason Lin<br>Creative : Ron Yang, Pulan Chen<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Eia Hung'
        },
        {
          id:         15,
          name:       'Macro Maison Official Site',
          year:       2016,
          type:       'Official Site / Backdrop & Scene Design',
          thumbnail:  { loaded: false },
          folder:     '2016_macromaison_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.gif','08.jpg','09.gif','10.jpg','11.jpg','12.jpg','13.jpg'],
          info:       'Client : Macro Maison<br>Agency : M’ORANGE<br>Project Manager : Nita Shih, Kevin Chen<br>Creative : Jacky Wen, Muji Lin<br>Design Director : Celia Cheng<br>Website Designer : Celia Cheng, Huang Yi Kai<br>Developer : Clouder Wang, Brent Hsieh<br>Backdrop Design : Huang Yi Kai'
        },
        {
          id:         16,
          name:       'Kirin Gogotea ”30 Days of Little Luxury” Campaign',
          year:       2016,
          type:       'Graphic / Photography / Exhibition',
          thumbnail:  { loaded: false },
          folder:     '2016_kirin_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih, Jessy Ho, GK Wang<br>Creative : Josephine Lin<br>Designer : Huang Yi Kai<br>Photographer : Huang Yi Kai'
        },
        {
          id:         17,
          name:       'Kirin Gogotea Autumn Special Recipe Video',
          year:       2016,
          type:       'Typography',
          thumbnail:  { loaded: false },
          folder:     '2016_kirin_02',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih, Jessy Ho, GK Wang<br>Creative : Josephine Lin<br>Designer : Huang Yi Kai<br>Model : Blaza Chen<br>Film Director : Webber Lee<br>Space : Afterhours café'
        },
        {
          id:         18,
          name:       'Kirin Gogotea Lucky Draw Campaign',
          year:       2016,
          type:       'Website',
          thumbnail:  { loaded: false },
          folder:     '2016_kirin_03',
          media:      ['01.gif','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Kevin Chen<br>Designer : Huang Yi Kai<br>Developer : Rick Ma'
        },
        {
          id:         19,
          name:       'Audi A4 Launch Campaign',
          year:       2016,
          type:       'Website / Printed Materials',
          thumbnail:  { loaded: false },
          folder:     '2016_audi_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg'],
          info:       'Client : Audi Taiwan<br>Agency : M’ORANGE<br>Project Manager : Jessy Ho, Joyce Huang, Mia Chen<br>Creative : Jacky Wen, Esther Su<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Eia Hung<br>Public Relations : Monica Chen'
        },
        {
          id:         20,
          name:       'Audi Features of the A6 & S8',
          year:       2016,
          type:       'Social Post Layout',
          thumbnail:  { loaded: false },
          folder:     '2016_audi_02',
          media:      ['01.jpg','02.jpg','03.jpg'],
          info:       'Client : Audi Taiwan<br>Agency : M’ORANGE<br>Project Manager : Joyce Huang<br>Designer : Huang Yi Kai'
        },
        {
          id:         21,
          name:       'Adidas Women Training Campaign',
          year:       2015,
          type:       'Website / Typography / Element',
          thumbnail:  { loaded: false },
          folder:     '2015_adidas_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg'],
          info:       'Client : Adidas Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih, Melody Gao, Tammy Yu<br>Creative : Josephine Lin, Fish Chang, Ming Gao<br>Design Director : Celia Cheng<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Shine Cheng, Chiou Chu'
        },
        {
          id:         22,
          name:       'Audi A3 Launch Campaign',
          year:       2013,
          type:       'Website',
          thumbnail:  { loaded: false },
          folder:     '2013_audi_01',
          media:      ['01.gif','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg'],
          info:       'Client : Audi Taiwan<br>Agency : M’ORANGE<br>Project Manager : Jessy Ho, Joyce Huang<br>Creative : Jacky Wen<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang, Eia Hung'
        },
        {
          id:         23,
          name:       'M’ORANGE Christmas Greeting Project',
          year:       2013,
          type:       'Graphic / Chalk Drawing',
          thumbnail:  { loaded: false },
          folder:     '2013_morange_01',
          media:      ['01.jpg','<div style="padding:51.6% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/499195879?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>','03.jpg','04.jpg','05.jpg'],
          info:       'Agency : M’ORANGE<br>Designer : Huang Yi Kai<br>Blackboard Painter : Celia Cheng, Huang Yi Kai<br>Developer : Clouder Wang, Eia Hung<br>Project Specialist : Kate Lin'
        },
        {
          id:         24,
          name:       'Nike Free Illustration',
          year:       2011,
          type:       '(Design Based on Nike Corporate Materials / Proposed Design) Illustration',
          thumbnail:  { loaded: false },
          folder:     '2011_nike_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg'],
          info:       'Client : Nike Taiwan<br>Agency : M’ORANGE<br>Design Director : Celia Cheng<br>Designer : Huang Yi Kai'
        },
        {
          id:         25,
          name:       'M’ORANGE Internal Workshop',
          year:       2010,
          type:       'Graphic / Photography / Typography',
          thumbnail:  { loaded: false },
          folder:     '2010_morange_01',
          media:      ['01.jpg','02.jpg','03.jpg'],
          info:       'Agency : M’ORANGE<br>Creative : Huang Yi Kai<br>Designer : Huang Yi Kai'
        },
      ]
    }
  },
  computed: {
    id() {
      return this.portfolio[this.$route.params.id - 1];
    }
  },
  methods: {
    getCurrentWork(prop) {
      var self = this;
      let work = this.portfolio.filter(function(item) {
        return item.id == self.$route.params.id;
      });
      return work[0][prop];
    },
    getImageUrl(source) {
      return require('../assets/' + source);
    },
    thumbnailLoaded(index) {
      var result = this.portfolio.filter(function(item) {
        return item.id == index;
      });
      result[0].thumbnail.loaded = true;
    }
  },
  mounted() {
    // var sidebar = document.querySelector('#sidebar');
    // console.log(sidebar.scrollHeight);
    // var list = document.querySelector('.list');
    // console.log(document.body.contains(list));
    var self = this;
    this.$Lazyload.$on('loaded', function ({ el }) {
      if (el.getAttribute('data-id') !== null) {
        let id = el.getAttribute('data-id');
        self.thumbnailLoaded(id);
      }
    })
  }
}
</script>

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
    padding-bottom: 30px;
    box-sizing: border-box;
    @media (min-width: $screen-md) { padding-top: 57px; padding-bottom: 75px; }
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
      width: 100%;
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
      @media (min-width: 480px) {
        width: 50%;
      }
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
        padding-top: 100%;
        background: #f6f6f6;
        overflow: hidden;
        img {
          position: absolute;
          top: 0;
          left: 0;
          display: block;
          width: 100%;
          height: 100%;
          object-fit: cover;
          opacity: 1;
          transition: opacity .3s;
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
        &.loading {
          img {
            opacity: 0;
          }
          &::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.6) 50%, rgba(255,255,255,0) 100%);
            animation: thumbnail-animation 1.75s infinite;
          }
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
    padding-bottom: 30px;

    @media (min-width: $screen-md) { padding-bottom: 75px; }

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
      .share {
        opacity: 1;
        transform: translateX(0);
        transition: 1s cubic-bezier(0.25, 1, 0.5, 1) .95s;
      }
    }

    &.fade-enter,
    &.fade-leave-to {

      .head {

        h3, .type, .share {
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
        pointer-events: none;
        // margin-bottom: 15px;
        // filter: blur(5px);
        opacity: 0;
        transition: opacity .3s;
        &[lazy="loaded"] {
          opacity: 1;
          // filter: blur(0);
        }
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

  @keyframes thumbnail-animation {
    0% {
      left: -100%;
    }
    100% {
      left: 100%;
    }
  }

}

</style>
