//vue-anime.js
import anime from 'animejs';

const VueAnime = {
    install (Vue) { // Vue, options
        Vue.$animeJS = anime;
    }
}

export default VueAnime