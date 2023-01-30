<script>
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import DarkMode from './components/DarkMode.vue'

export default {
    name: "App",
    components:{
        Header,
        Footer,
        DarkMode
    }
}
</script>

<template>
    <Header />
    <router-view></router-view>
    <Footer />
</template>

<style>
@import "../scss/appVue.scss";
</style>
