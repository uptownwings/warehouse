<template>
<ul>
  <li v-for="locale in locales" :key="locale" @click="switchLocale(locale)">
    {{locale}}
  </li>
</ul>
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
