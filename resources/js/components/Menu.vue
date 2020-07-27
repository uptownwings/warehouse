<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <router-link :to="{name: 'home'}" class="navbar-brand">Warehouse Coding Test</router-link>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" v-if="$auth.check(1)">
                <li class="nav-item" v-for="(route, key) in routes.user" v-bind:key="route.path">
                    <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto" v-if="$auth.check(2)">
                <li class="nav-item" v-for="(route, key) in routes.user" v-bind:key="route.path">
                    <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" v-if="!$auth.check()">
                <li class="nav-item" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                    <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto" v-if="$auth.check()">
                <li class="nav-item">
                    <router-link :to="{ name: 'dashboard'}" class="nav-link">Dashboard</router-link>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" v-if="$auth.check()">
                <li class="nav-item">
                    <a class="nav-link" href="#" @click.prevent="$auth.logout()">Logout</a>
                </li>
            </ul>

            <!-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
</template>
<script>
    export default {
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
        }
    }
</script>

<style>
    .navbar {
        margin-bottom: 30px;
    }
</style>
