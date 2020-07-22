<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <!-- Default form login -->
                    <form class="text-center border border-light p-5" action="#!">

                        <p class="h4 mb-4">Sign in</p>

                        <!-- Email -->
                        <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" v-model="email">

                        <!-- Password -->
                        <input type="password" id="password" class="form-control mb-4" placeholder="Password" v-model="password">

                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Forgot password -->
                                <a href="">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Sign in button -->
                        <button class="btn btn-info btn-block my-4" v-on:click="login">Sign in</button>

                        <!-- Register -->
                        <p>Not a member?
                            <a href="">Register</a>
                        </p>

                    </form>
                    <!-- Default form login -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'LoginComponent',
        data () {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login () {
                let loginMessage = {'email' : this.email, 'password': this.password};
                axios.post('/auth/login', loginMessage).then(
                    window.location('/')
                ).catch(
                    alert('Wrong username or password')
                );
            }
        }

    }
</script>
