require('./bootstrap');

import 'es6-promise/auto'
import axios from 'axios'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import auth from './auth'
import router from './router'
import Chartkick from 'vue-chartkick'
import Chart from 'chart.js'
import VueConfirmDialog from 'vue-confirm-dialog'
import VueInternationalization from 'vue-i18n'
import messages from './locale/message';

// Set Vue router
Vue.router = router
Vue.use(VueRouter)

// Internationalization
Vue.use(VueInternationalization)
const lang = localStorage.getItem('locale') || 'en';
const i18n = new VueInternationalization({
    locale: lang,
    messages: messages
})

// Initialize confirmation dialog
Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default)

// Initialize charting libraries
Vue.use(Chartkick.use(Chart))

// Define currency filter
Vue.filter('toCurrency', function (value) {
    value = parseFloat(value)

    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'EUR',
        minimumFractionDigits: 2
    });
    return formatter.format(value);
});

// Set Vue authentication
Vue.use(VueAxios, axios)
Vue.use(VueAuth, auth)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`

Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
 });


// Set Vue globally
window.Vue = Vue



Vue.component('index', Index)
Vue.component('pagination', require('laravel-vue-pagination'));
const app = new Vue({
    el: '#app',
    i18n,
    router,
    messages
})
