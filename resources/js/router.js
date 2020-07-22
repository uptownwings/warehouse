import VueRouter from 'vue-router';

import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';
import LoginComponent from "./components/LoginComponent";

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

    const router = new VueRouter({
        history: true,
        mode: 'history',
        routes,
    })
    export default router
