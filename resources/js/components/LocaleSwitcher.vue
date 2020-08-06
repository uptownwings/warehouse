<template>

<div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Choose a language
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a v-for="locale in locales" :key="locale" @click="switchLocale(locale)" class="dropdown-item">{{locale}}</a>
  </div>
  <ul>
</ul>
</div>

</template>
<script>
export default {
  name: 'LocaleSwitcher',
  methods: { // <---------------------------
    switchLocale(locale) {
      if (this.$i18n.locale !== locale) {
        this.$i18n.locale = locale;
      }
    }
  },
  data() {
    return {
      locales: 'en,lt,nl'.split(',')
    }
  }
}
</script>
<style scoped>
li {
  text-decoration: underline;
  color: #000000;
  cursor: pointer;
}
</style>
