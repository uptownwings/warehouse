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


// Set Vue globally
window.Vue = Vue

// Set Vue router
Vue.router = router
Vue.use(VueRouter)

// Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`
Vue.use(VueAuth, auth)

Vue.component('index', Index)
Vue.component('pagination', require('laravel-vue-pagination'));
const app = new Vue({
    el: '#app',
    router
})
