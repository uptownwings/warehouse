<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-6">
        <div class="card card-default">
          <div class="card-header"><h2>{{ $t('register.title') }}</h2></div>
          <div class="card-body">
            <div class="alert alert-danger" v-if="has_error && !success">
                <p v-if="error == 'registration_validation_error'">Validation Errors.</p>
                <p v-else>Error, can not register at the moment. If the problem persists, please contact an administrator.</p>
            </div>
            <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.name }">
                    <label for="name">{{ $t('register.name') }}</label>
                    <input type="text" id="name" class="form-control" placeholder="Full Name" v-model="name">
                    <span class="help-block" v-if="has_error && errors.name">{{ errors.name }}</span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                    <label for="email">{{ $t('register.email') }}</label>
                    <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email">
                    <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                    <label for="password">{{ $t('register.password') }}</label>
                    <input type="password" id="password" class="form-control" v-model="password">
                    <span class="help-block" v-if="has_error && errors.password">{{ errors.password }}</span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                    <label for="password_confirmation">{{ $t('register.confirmation') }}</label>
                    <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">{{ $t('register.submit') }}</button>
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
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        has_error: false,
        error: '',
        errors: {},
        success: false
      }
    },
    methods: {
      register() {
        var app = this
        this.$store
        .dispatch('register', {
            name: app.name,
            email: app.email,
            password: app.password,
            password_confirmation: app.password_confirmation
          })
        .then(() => {
            app.success = true
            this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
        })
        .catch(err => {
            app.has_error = true
            app.error = res.response.data.error
            app.errors = res.response.data.errors || {}
        })
      }
    }
  }
</script>
