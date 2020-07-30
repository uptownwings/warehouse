<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Welcome to the warehouse</div>
            <div class="card-body">
                <p>Please <router-link to="login">log in</router-link> or <router-link to="register">register</router-link> for a new account and then log in.</p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'HomeComponent'
    }
</script>
