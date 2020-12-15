module.exports = {
    css: { // [Reference] https://css-tricks.com/how-to-import-a-sass-file-into-every-vue-component-in-an-app/
        loaderOptions: {
            sass: {
                prependData: `@import "@/assets/styles/_variables.scss";`
            }
        }
    },
    pages: {

        index: {
            // entry for the page
            entry: 'src/main.js',
            // the source template
            template: 'public/index.html',
            // output as dist/index.html
            filename: 'index.html',
            // when using title option,
            // template title tag needs to be <title><%= htmlWebpackPlugin.options.title %></title>
            title: 'Work of a Decade',
            // chunks to include on this page, by default includes
            // extracted common chunks and vendor chunks.
            chunks: ['chunk-vendors', 'chunk-common', 'index']
        }

    },
    // configureWebpack: {
    //     externals: {
    //         'jquery': 'jQuery'
    //     }
    // },
    // devServer: {
    //     historyApiFallback: true
    // },
    // publicPath: './'
    publicPath: process.env.NODE_ENV === 'production' ? '/work10/' : '/'
}
