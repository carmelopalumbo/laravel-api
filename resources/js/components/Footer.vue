<script>
import DarkMode from './DarkMode.vue';
export default {
    name: "Footer",
    components:{
        DarkMode
    }
}
</script>

<template>
    <div class="container d-flex justify-content-between">
        <p class="ms-5">Carmelo Palumbo | 2023 © All rights reserved.</p>
        <DarkMode />
        <a class="me-5" href="http://127.0.0.1:8000/admin">ADMIN AREA</a>
    </div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

.container{
    border-top: 2px solid $mark-text;
    padding: 30px 0;
    p{
        font-style: italic;
        font-size: 0.9rem;
    }
    a{
        text-decoration: none;
        color: grey;
        font-size: .8rem;
        transition: .2s all;
        &:hover{
            color: lighten(grey, 15%);
        }
    }
}

</style>
