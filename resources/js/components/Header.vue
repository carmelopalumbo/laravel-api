<script>
export default {
    name: "Header",
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

.container{
    border-bottom: 2px solid $mark-text;
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
                transition: .3s all;
                border-radius: 5px;
                &:hover{
                    background-color: $mark-text;
                    color: white;
                    padding: 7px 9px;
                }
            }
        }
    }

    .active{
        color: white;
        -webkit-text-stroke: 1.5px $mark-text;
        &:hover{
            padding: 0;
            background-color: transparent;
        }
    }
}


</style>
