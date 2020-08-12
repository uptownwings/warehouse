<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <router-link v-if="!$store.state.user" :to="{name: 'home'}" class="navbar-brand">Warehouse Coding Test</router-link>
        <router-link v-if="$store.state.user" :to="{name: 'dashboard'}" class="navbar-brand">Warehouse Coding Test</router-link>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto" v-if="!$store.state.user">
                <li class="nav-item" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                    <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{ $t('menu.'+route.name) }}</router-link>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" v-if="$store.state.user">
                <li class="nav-item">
                    <a class="nav-link" href="#" @click.prevent="logout">{{ $t('menu.Logout') }}</a>
                </li>
            </ul>
            <LocaleSwitcher />
        </div>
    </nav>
</template>
<script>
    import LocaleSwitcher from './LocaleSwitcher.vue'

    export default {
        components: {
            LocaleSwitcher
        },
        data() {
            return {
                routes: {
                    // Access for users that are not logged in
                    unlogged: [
                        { name: 'Register', path: 'register' },
                        { name: 'Login', path: 'login'}
                    ],
                    // Users that are logged in
                    user: [
                        { name: 'Dashboard', path: 'dashboard' }
                    ],
                    // Admins that are logged in.
                    admin: [
                        { name: 'Dashboard', path: 'admin.dashboard' }
                    ]
                }
            }
        },
        mounted() {
            //
        },
        methods: {
            logout() {
                this.$store.dispatch('logout');
            }
        }
    }
</script>
<style>
    .navbar {
        margin-bottom: 30px;
    }
</style>
