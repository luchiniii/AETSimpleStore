/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import ExampleComponent from './components/ExampleComponent';
import ValidationErrors from './components/ValidationErrors';

//vendor components
import ProductCreateComponent from './components/products/Create';
import ProductShowComponent from './components/products/Show';

// Public components
import ProductPublicIndexComponent from './components/public/Index';
import ProductPublicShowComponent from './components/public/Show';

require('./bootstrap');

window.Vue = require('vue');

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', ExampleComponent);
Vue.component('product-creation-component', ProductCreateComponent);
Vue.component('validation-errors', ValidationErrors);
Vue.component('product-show-component', ProductShowComponent);


Vue.component('product-public-index-component', ProductPublicIndexComponent);
Vue.component('product-public-show-component', ProductPublicShowComponent);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
