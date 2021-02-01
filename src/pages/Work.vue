<template>
  <div id="page-works" class="page">
    <h2 v-if="!this.$route.params.id">Work</h2>
    <h2 v-else><router-link to="/work">Work</router-link></h2>
    <transition name="fade">
      <div class="list" v-if="!this.$route.params.id">
        <ul>
          <li v-for="(item, index) in portfolio" v-bind:key="index" v-bind:style="{'transition-delay': (0.1 * index) + 's'}">
            <router-link :to="{ name: 'Work', params: { id: item.id } }" :data-id="item.id" :data-year="item.year" :data-name="item.name">
              <div :class="{loading: !item.thumbnail.loaded}" class="thumbnail">
                <!-- <img :src="item.thumbnail.src" v-on:load="thumbnailLoaded(item.id)"> -->
                <img :src="getImageUrl('images/work/' + item.folder + '/cover.jpg')" v-on:load="thumbnailLoaded(item.id)">
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
            <img v-if="/[\/.](gif|jpg|jpeg|tiff|png)$/g.test(item)" :src="getImageUrl('images/work/' + $data.portfolio[getCurrentId()].folder + '/' + item)">
            <div class="embed" v-html="item" v-else></div>
          </div>
          <!-- <img :src="this.portfolio[this.$route.params.id - 1].images[2]"> -->
        </div>
        <div class="info">
          <p v-html="this.portfolio[this.$route.params.id - 1].info.replace(/:/g, '<i></i>')"></p>
        </div>
        <Footer />
      </div>
    </transition>
  </div>
</template>

<script>
import Footer from '../components/Footer.vue'

export default {
  name: 'Work',
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
          name:       'Kiânn Official Site',
          year:       2020,
          type:       'Website',
          thumbnail:  { loaded: false },
          folder:     '2020_kiann_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg'],
          info:       'Client : Starlux Airlines<br>Agency : M’ORANGE<br>Editorial Director : Melody Kao / Estate Media<br>Design Executive Director : Mong Lee<br>Project Manager : Kevin Chen、Welson Hsiao<br>Website Designer : Huang Yi Kai<br>Developer : Clouder Wang、Brent Hsieh、Leo Lin'
        },
        {
          id:         2,
          name:       'Kiânn Official Site Intro : Let’s Kiann',
          year:       2020,
          type:       'Concept / Storyboard / Motionboard / Art & Graphic',
          thumbnail:  { loaded: false },
          folder:     '2020_kiann_02',
          media:      ['<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/487718203?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>','02.jpg','03.jpg','04.jpg','05.gif','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg','19.jpg','20.jpg','21.jpg','22.jpg','23.jpg','24.jpg'],
          info:       'Client : Starlux Airlines<br>Agency : M’ORANGE<br>Editorial Director : Melody Kao / Estate Media<br>Design Executive Director : Mong Lee<br>Website Designer : Huang Yi Kai<br>Animation Director : Tubo Lee<br>Project Manager : Akasha Wu<br>Cel animation : Szyu Pan<br>Motion Design :  Tubo Lee / Toastwo Creative<br>Music & Sound Design : Co-op Works'
        },
        {
          id:         3,
          name:       'Tefal New Gourmet Wave Key Visual',
          year:       2019,
          type:       'Key Visual / Typography',
          thumbnail:  { loaded: false },
          folder:     '2019_tefal_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg'],
          info:       'Client : Tefal Taiwan<br>Agency : M’ORANGE<br>Project Manager : Sinia Peng、Elena Hu<br>Key Visual Designer : Huang Yi Kai<br>Website Designer : Aju Tsai<br>Developer : Clouder Wang、Leo Lin'
        },
        {
          id:         4,
          name:       'Yuan Launch Campaign',
          year:       2019,
          type:       '(Proposed Design) Website',
          thumbnail:  { loaded: false },
          folder:     '2019_yuan_01',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg'],
          info:       'Client : Yuan<br>Agency : M’ORANGE<br>Project Manager : Jessy Ho、Erik Huang<br>Creative : Jacky Wen、Muji Lin、Zoi Hung<br>Designer : Huang Yi Kai'
        },
        {
          id:         5,
          name:       'M’ORANGE Annual Briefing Key Visual',
          year:       2019,
          type:       'Graphic',
          thumbnail:  { loaded: false },
          folder:     '2019_morange_01',
          media:      ['01.jpg','02.jpg','03.jpg'],
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
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Kevin Chen、Judy Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Shine Cheng'
        },
        {
          id:         8,
          name:       'Kirin Travel Hyoketsu Campaign',
          year:       2018,
          type:       'Website / Typography / Handwriting',
          thumbnail:  { loaded: false },
          folder:     '2018_kirin_02',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Kevin Chen、Judy Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Brent Hsieh'
        },
        {
          id:         9,
          name:       'Kirin Gogotea Photography',
          year:       2018,
          type:       'Photography / Handwriting',
          thumbnail:  { loaded: false },
          folder:     '2018_kirin_03',
          media:      ['01.jpg','02.jpg','03.jpg','04.jpg'],
          info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Photographer : Huang Yi Kai<br>Hand Writing : Huang Yi Kai<br>Model : Stephanie Su、Urania Chiu'
        },
        {
          id:         10,
          name:       'New Balance Campus Relay Campaign',
          year:       2018,
          type:       '(Proposed Design) Key Visual Mockup / Typography / Package Design',
          thumbnail:  { loaded: false },
          folder:     '2018_nb_01',
          media:      ['01.jpg','02.jpg','03.gif','04.jpg','05.jpg','06.jpg'],
          info:       'Client : New Balance Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih、Jessy Ho、Erik Huang<br>Creative : Jacky Wen、Muji Lin、Zoi Hung<br>Designer : Huang Yi Kai<br>Public Relations : Monica Chen、Flora Huang'
        },
        // {
        //   id:         11,
        //   name:       'New Balance Campus Relay Campaign',
        //   year:       2017,
        //   type:       'Website / Typography',
        //   thumbnail:  { src: 'https://picsum.photos/814/814/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : New Balance Taiwan<br>Agency : M’ORANGE<br>Project Manager : Jessy Ho、Elaine Lin<br>Creative : Jacky Wen、Muji Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Brent Hsieh、Eia Hung<br>Public Relations : Monica Chen、Flora Huang<br>Project Specialist : Kate Lin<br>Production Studio : Lion Flying Production'
        // },
        // {
        //   id:         12,
        //   name:       'New Balance Official Site',
        //   year:       2017,
        //   type:       'Website',
        //   thumbnail:  { src: 'https://picsum.photos/810/810/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : New Balance Taiwan<br>Agency : M’ORANGE<br>Project Manager : Kevin Chen、Judy Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Shine Cheng'
        // },
        // {
        //   id:         13,
        //   name:       'New Balance 247 Campaign',
        //   year:       2017,
        //   type:       'Website / Element / Handwriting / Typography / OOH / Event Materials / Printed Materials',
        //   thumbnail:  { src: 'https://picsum.photos/800/800/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : New Balance Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih、Jessy Ho、Jason Lin<br>Creative : Jacky Wen、Muji Lin、Pika Lin<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Eia Hung<br>OOH Modeling Designer : Lackers Lee<br>Project Specialist : Kate Lin<br>Photographer : Rooster Chen'
        // },
        // {
        //   id:         14,
        //   name:       'MUJI Skin Care Campaign',
        //   year:       2017,
        //   type:       'Website / Illustration',
        //   thumbnail:  { src: 'https://picsum.photos/802/802/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : MUJI Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih、Jason Lin<br>Creative : Ron Yang、Pulan Chen<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Eia Hung'
        // },
        // {
        //   id:         15,
        //   name:       'Macro Maison Official Site',
        //   year:       2016,
        //   type:       'Website / Backdrop & Scene Design',
        //   thumbnail:  { src: 'https://picsum.photos/804/804/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Macro Maison<br>Agency : M’ORANGE<br>Project Manager : Nita Shih、Kevin Chen<br>Creative : Jacky Wen、Muji Lin<br>Design Director : Celia Cheng<br>Website Designer : Celia Cheng、Huang Yi Kai<br>Developer : Clouder Wang、Brent Hsieh<br>Backdrop Design : Huang Yi Kai'
        // },
        // {
        //   id:         16,
        //   name:       'Kirin GoGoTea ”30 Days of Little Luxury” Campaign',
        //   year:       2016,
        //   type:       'Graphic / Photography / Exhibition',
        //   thumbnail:  { src: 'https://picsum.photos/806/806/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih、Jessy Ho、GK Wang<br>Creative : Josephine Lin<br>Designer : Huang Yi Kai<br>Photographer : Huang Yi Kai'
        // },
        // {
        //   id:         17,
        //   name:       'Kirin GoGoTea Autumn Special Recipe Video',
        //   year:       2016,
        //   type:       'Typography',
        //   thumbnail:  { src: 'https://picsum.photos/808/808/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih、Jessy Ho、GK Wang<br>Creative : Josephine Lin<br>Designer : Huang Yi Kai<br>Model : Blaza Chen<br>Film Director : Webber Lee<br>Space : Afterhours café'
        // },
        // {
        //   id:         18,
        //   name:       'Kirin GoGoTea Lucky Draw Campaign',
        //   year:       2016,
        //   type:       'Website',
        //   thumbnail:  { src: 'https://picsum.photos/812/812/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Kirin Taiwan<br>Agency : M’ORANGE<br>Project Manager : Kevin Chen<br>Designer : Huang Yi Kai<br>Developer : Rick Ma'
        // },
        // {
        //   id:         19,
        //   name:       'Audi A4 Launch Campaign',
        //   year:       2016,
        //   type:       'Website / Printed Materials',
        //   thumbnail:  { src: 'https://picsum.photos/814/814/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Audi Taiwan<br>Agency : M’ORANGE<br>Project Manager : Jessy Ho、Joyce Huang、Mia Chen<br>Creative : Jacky Wen、Esther Su<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Eia Hung<br>Public Relations : Monica Chen'
        // },
        // {
        //   id:         20,
        //   name:       'Audi Features of the A6 & S8',
        //   year:       2016,
        //   type:       'Layout',
        //   thumbnail:  { src: 'https://picsum.photos/805/805/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Audi Taiwan<br>Agency : M’ORANGE<br>Project Manager : Joyce Huang<br>Designer : Huang Yi Kai'
        // },
        // {
        //   id:         21,
        //   name:       'Adidas Women Training Campaign',
        //   year:       2015,
        //   type:       'Website / Visual / Typography',
        //   thumbnail:  { src: 'https://picsum.photos/802/802/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Adidas Taiwan<br>Agency : M’ORANGE<br>Project Manager : Nita Shih、Jessy Ho、Elaine Lin<br>Creative : Josephine Lin、Fish Chang、Ming Gao<br>Design Director : Celia Cheng<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Shine Cheng、Chiou Chu'
        // },
        // {
        //   id:         22,
        //   name:       'Audi A3 Launch Campaign',
        //   year:       2013,
        //   type:       'Website',
        //   thumbnail:  { src: 'https://picsum.photos/820/820/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Audi Taiwan<br>Agency : M’ORANGE<br>Project Manager : Jessy Ho、Joyce Huang<br>Creative : Jacky Wen<br>Designer : Huang Yi Kai<br>Developer : Clouder Wang、Eia Hung'
        // },
        // {
        //   id:         23,
        //   name:       'M’ORANGE Christmas Greeting Project',
        //   year:       2013,
        //   type:       'Graphic / Chalk Drawing',
        //   thumbnail:  { src: 'https://picsum.photos/818/818/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Agency : M’ORANGE<br>Designer : Huang Yi Kai<br>Blackboard Painter : Celia Cheng、Huang Yi Kai<br>Developer : Clouder Wang、Eia Hung<br>Project Specialist : Kate Lin'
        // },
        // {
        //   id:         24,
        //   name:       'Nike free illustration',
        //   year:       2011,
        //   type:       '(Design Based on Nike Corporate Materials / Proposed Design) Illustration',
        //   thumbnail:  { src: 'https://picsum.photos/816/816/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Client : Nike Taiwan<br>Agency : M’ORANGE<br>Design Director : Celia Cheng<br>Designer : Huang Yi Kai'
        // },
        // {
        //   id:         25,
        //   name:       'M’ORANGE Internal Worksop',
        //   year:       2010,
        //   type:       'Graphic / Photography / Typography',
        //   thumbnail:  { src: 'https://picsum.photos/814/814/', loaded: false },
        //   folder:     'sample',
        //   media:      ['1.jpg'],
        //   info:       'Agency : M’ORANGE<br>Creative : Huang Yi Kai<br>Designer : Huang Yi Kai'
        // },
        // {
        //   id:         2,
        //   name:       'kiann',
        //   year:       2019,
        //   type:       'Graphic Design / Hand Write / Photography',
        //   thumbnail:  { src: 'https://picsum.photos/2500/2500/', loaded: false },
        //   folder:     'kiann',
        //   media:      [
        //     '<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/487718203?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div>',
        //     '2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg','19.jpg','20.jpg','21.jpg'
        //   ],
        //   info:       'Client → New Balance<br>Co-Designer → Celia<br>Motion Design → Lackers'
        // },
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
    },
    thumbnailLoaded(index) {
      var result = this.portfolio.filter(function(item) {
        return item.id == index;
      });
      result[0].thumbnail.loaded = true;
    }
  },
  // mounted() {
  //   var sidebar = document.querySelector('#sidebar');
  //   console.log(sidebar.scrollHeight);
  //   var list = document.querySelector('.list');
  //   console.log(document.body.contains(list));
  // }
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
          // &.loading {
          //   opacity: 0;
          // }
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
