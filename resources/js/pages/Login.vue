<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="card card-default">
                    <div class="card-header"><h2>{{ $t('login.title') }}</h2></div>
                    <div class="card-body">
                        <div class="alert alert-danger" v-if="has_error && !success">
                            <p v-if="error == 'login_error'">Validation Errors.</p>
                            <p v-else>Error, unable to connect with these credentials.</p>
                        </div>
                        <form autocomplete="off" @submit.prevent="login" method="post">
                            <div class="form-group">
                                <label for="email">{{ $t('login.email') }}</label>
                                <input type="email" id="email" class="form-control" placeholder="user@example.com"
                                       v-model="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">{{ $t('login.password') }}</label>
                                <input type="password" id="password" class="form-control" v-model="password" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <router-link to="resetpassword">{{ $t('login.forgot') }}</router-link>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ $t('login.login') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                email: null,
                password: null,
                success: false,
                has_error: false,
                error: ''
            }
        },
        methods: {
            login() {
                let redirect = 'dashboard'
                let app = this

                this.$auth.login({
                    data: {
                        email: app.email,
                        password: app.password
                    },
                    success: function () {
                        (response) => {
                            console.log(response)
                        }
                    },
                    error: function () {},
                    redirect: '/dashboard',
                    rememberMe: true,
                    fetchUser: true
                })
            }
        }
    }
</script>
