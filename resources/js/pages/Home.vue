<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header"><h2>{{ $t('home.welcome') }}</h2></div>
            <div class="card-body">
                <p>{{ $t('home.main1') }} <router-link to="login">{{ $t('home.main2') }}</router-link> {{ $t('home.main3') }} <router-link to="register">
                    {{ $t('home.main4') }}</router-link> {{ $t('home.main5') }}.</p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'HomeComponent'
    }
</script>
