require('./check-versions')()

process.env.NODE_ENV = 'development'

var ora = require('ora')
var rm = require('rimraf')
var path = require('path')
var chalk = require('chalk')
var webpack = require('webpack')
var config = require('../config')
var webpackConfig = require('./webpack.dev.conf')

var spinner = ora('building for development...')
spinner.start()

rm(path.join(config.build.assetsRoot, config.build.assetsSubDirectory), err => {
  if (err) throw err
  webpack(webpackConfig, function (err, stats) {
    spinner.stop()
    if (err) throw err
    process.stdout.write(stats.toString({
      colors: true,
      modules: false,
      children: false,
      chunks: false,
      chunkModules: false
    }) + '\n\n')

    console.log(chalk.green('  Build complete.\n'))
    console.log(chalk.green('  Run your local Wordpress installation as you would normally.\n'))
    console.log(chalk.cyan('  Make sure to run \'npm run build\' for production-ready files.\n'))
    console.log(chalk.yellow(
      '  Watching files...'
    ))
  })
})
