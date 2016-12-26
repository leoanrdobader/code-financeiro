import LocalStorage from './services/localStorage';
require('materialize-css');

window.Vue = require('vue');
require('vue-resource');
//const url = window.location.protocol + "//" + window.location.host+  "/api";
const url = window.location.protocol + "//localhost/api";
Vue.http.options.root = url;
//console.log('url: -> '+ url);

require('./router');

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
