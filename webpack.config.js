var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[ext]',
    })
    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')

    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // enables Sass/SCSS support
    .enableSassLoader()
    //.enableTypeScriptLoader()
    .autoProvidejQuery()
    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[ext]',
    })
;

module.exports = Encore.getWebpackConfig();