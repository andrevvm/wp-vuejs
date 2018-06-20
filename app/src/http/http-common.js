window.auth = false;
import axios from 'axios';

var baseURL = [window.location.protocol, '//', window.location.host].join('')

var HTTP = axios.create({
  baseURL: baseURL
})

const reqUrl = function (path) {
  //If query string present, use & instead of ?
  var op = '?'
  if(window.location.search.length > 0) {
    op = window.location.search + '&'
  } 

  //Always use core WP URLs to fetch data
  var url = baseURL + path + op + 'json=true'

  return url
}

// gzip response
axios.defaults.headers.common['Content-Encoding'] = 'gzip'

//If user cookie authenticated, add auth header. Makes sure drafts and previews are fetched from WP.
if(typeof wpApiSettings != 'undefined') {
  window.auth = true;
  axios.defaults.headers.common['X-WP-Nonce'] = wpApiSettings.nonce;
}

export { reqUrl, HTTP }