<script>
export default {
    name: "Footer"
}
</script>

<template>
    <div class="container d-flex justify-content-between">
        <p class="ms-5">Carmelo Palumbo | 2023 © All rights reserved.</p>
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
        color: white;
    }
}

</style>
