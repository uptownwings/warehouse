<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="card card-default">
                    <div class="card-header">Reset your password</div>
                    <div class="card-body">
                        <div class="alert alert-danger" v-if="has_confirmation && success">
                            <p>{{ has_confirmation.data.message }}</p>
                        </div>
                        <form autocomplete="off" @submit.prevent="reset" method="post">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" class="form-control" placeholder="user@example.com"
                                       v-model="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Reset password</button>
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
                success: false,
                has_error: false,
                has_confirmation: false,
                error: ''
            }
        },
        methods: {
            reset() {
                let redirect = this.$auth.redirect()
                let app = this

                let data = {email: app.email}
                axios.post('auth/reset', data).then(
                    (response => {
                        this.success = true
                        this.has_confirmation = response
                        app.email = ''
                    })
                )
            }
        }
    }
</script>
