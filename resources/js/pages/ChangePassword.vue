<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="card card-default">
                    <div class="card-header">Change your password</div>
                    <div class="card-body">
                        <div class="alert alert-danger" v-if="has_error && !success">
                            <p v-if="error == 'registration_validation_error'">Validation Errors.</p>
                            <p v-else>Error, can not register at the moment. If the problem persists, please contact an
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
                alert(this.token);
            }
        }
    }
</script>
