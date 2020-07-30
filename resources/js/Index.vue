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
    export default {
        data() {
            return {
                //
            }
        },
        components: {
            Menu,
        }
    }
</script>
