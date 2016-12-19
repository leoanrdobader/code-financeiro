import LoginComponent from './components/Login.vue';
import AppComponent from './components/App.vue';

require('materialize-css');

window.Vue = require('vue');
//require('vue-resource');

Vue.component('app', require('./components/App.vue'));

let VueRouter = require('vue-router');
const router = new VueRouter();
router.map({
    '/login':{
        name: 'auth.login',
        component: LoginComponent
    }
})

router.start({
    components: {
        'app': AppComponent
    }
},'body');

// const app = new Vue({
//     el: 'body'
// });

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
