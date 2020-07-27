<template>
    <div id="main">
        <header id="header">
            <MenuComponent></MenuComponent>
        </header>
        <div id="content">
            <router-view></router-view>
        </div>
    </div>
</template>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>
<script>
    import MenuComponent from "./components/MenuComponent";
    export default {
        data() {
            return {
                //
            }
        },
        components: {
            MenuComponent
        }
    }
</script>
