<template>
    <div id="main">
        <vue-confirm-dialog></vue-confirm-dialog>
        <header id="header">
            <Menu></Menu>
        </header>
        <div id="content">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    import Menu from './components/Menu.vue'
    import LocaleSwitcher from './components/LocaleSwitcher.vue'
    export default {
        data() {
            return {
                //
            }
        },
        components: {
            Menu,
            LocaleSwitcher
        }
    }
</script>
