require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';
import LoginComponent from "./components/LoginComponent";
import 'es6-promise/auto'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import auth from './auth'

window.Vue = Vue

Vue.use(VueRouter);

Vue.use(VueAxios, axios);
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`

Vue.use(VueAuth, auth)

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent,
        meta: {
            auth: true
        }
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent,
        meta: {
            auth: true
        }
    },
    {
        name: 'posts',
        path: '/posts',
        component: IndexComponent,
        meta: {
            auth: true
        }
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent,
        meta: {
            auth: true
        }
    },
    {
        name: 'login',
        path: '/login',
        component: LoginComponent,
        meta: {
            auth: false
        }
    }
    ];

    const router = new VueRouter({history: true, mode: 'history', routes: routes});
    const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
