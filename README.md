# Wordpress VueJS Starter Theme

> A barebones Vue.js + Webpack + Wordpress + ACF starter theme.

Unlike other Vue.js Wordpress themes, this one does not use the WP REST API. Instead, every Wordpress URL becomes a JSON endpoint by adding the parameter ?json=true. This keeps all of the core WP admin functionality intact, like previewing drafts/published posts, and ACF support, without additional plugins or complicated API configurations.

## Build Setup

``` bash
# Open ./_app folder in Terminal

# install dependencies
npm install

# development build files + watch
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report
```