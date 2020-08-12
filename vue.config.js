module.exports = {
    css: { // [Reference] https://css-tricks.com/how-to-import-a-sass-file-into-every-vue-component-in-an-app/
        loaderOptions: {
            sass: {
                prependData: `@import "@/assets/styles/_variables.scss";`
            }
        }
    },
    configureWebpack: {
        externals: {
            'jquery': 'jQuery'
        }
    },
    publicPath: './'
}
