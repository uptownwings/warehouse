<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="card card-default">
                    <div class="card-header">Change your password</div>
                    <div class="card-body">
                        <div class="alert alert-danger" v-if="has_error && !success">
                            <p v-if="error == 'validation_error'">Passwords do not match.</p>
                            <p v-else>Error, can not change passwords at the moment. If the problem persists, please contact an
                                administrator.</p>
                        </div>
                        <form autocomplete="off" @submit.prevent="changePassword" v-if="!success" method="post">
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" v-model="password">
                                <span class="help-block"
                                      v-if="has_error && errors.password">{{ errors.password }}</span>
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                                <label for="password_confirmation">Password confirmation</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                       v-model="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import router from "../router";

    export default {
        data() {
            return {
                token: this.$route.query.token,
                password: '',
                password_confirmation: '',
                has_error: false,
                error: '',
                errors: {},
                success: false
            }
        },
        methods: {
            changePassword() {
                if (this.password !== this.password_confirmation) {
                    this.has_error = true
                    this.error = 'validation_error'
                    this.errors.password = 'passwords do not match'
                } else {
                    let data = {
                        token: this.token,
                        password: this.password
                    }
                    axios.post('auth/changepassword', data).then(
                        (response) => {
                            this.$router.push({name: 'login'})
                        }, (error) => {
                            this.has_error = true;
                            this.error = error;
                        }
                    )
                }
            }
        }
    }
</script>
