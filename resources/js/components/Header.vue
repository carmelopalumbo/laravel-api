<script>
export default {
    name: "Header"
}
</script>

<template>
    <div class="container">
        <div class="row d-flex justify-content-center py-3">
            <img src="../../image/publiclogo.png" alt="">
        </div>
        <div class="row">
            <ul class="py-4">
                <li>
                    <router-link :to="{name: 'home'}">HOME</router-link>
                </li>
                <li>
                    <router-link :to="{name: 'projects'}">PROGETTI</router-link>
                </li>
                <li>
                    <router-link :to="{name: 'about'}">CHI SONO</router-link>
                </li>
                <li>
                    <router-link :to="{name: 'contacts'}">CONTATTI</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

    img{
    width: 200px;
    }

    ul{
        list-style: none;
        text-align: center;
        li{
            display: inline-block;
            margin: 0 25px;
            a{
                text-decoration: none;
                font-weight: bold;
                font-size: 1.2rem;
                color: $mark-text;
            }
        }
    }

</style>
