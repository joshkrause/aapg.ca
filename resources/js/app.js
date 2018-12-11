
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Form = Form;

Vue.component('passport-clients',require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients',require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue'));

// Vue Forms
import { Form, HasError, AlertError } from 'vform';
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// Sweet Alert
import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;

// Moment
import moment from 'moment';

// Filters
import filters from './filters';

// Vue Progress Bar
import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, {
    color: 'rgb(143,255,199)',
    failedColor: 'red',
    height: '3px'
});

// Vue Select2
import vSelect from 'vue-select'
Vue.component('v-select', vSelect);

// Vue Router
import VueRouter from 'vue-router';
Vue.use(VueRouter)
let routes = [
    { path: '/admin', component: require('./components/admin/Dashboard.vue') },
    { path: '/admin/profile', component: require('./components/admin/Profile.vue') },
    { path: '/admin/users', component: require('./components/admin/Users.vue') },
    { path: '/admin/developers', component: require('./components/admin/Developer.vue') },
    { path: '/admin/conferences', component: require('./components/admin/Conferences.vue') },
    { path: '/admin/schedules', component: require('./components/admin/Schedule.vue') },
]
const router = new VueRouter({
    mode: 'history',
    routes
});

// Event Listener

window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router
});
