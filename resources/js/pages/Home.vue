<script>
export default {
    name: "Home"
}
</script>

<template>
    <div class="container w-75 py-3 animate__animated animate__backInLeft">
        <div class="row">
            <div class="col-6">
                <img src="../../image/profile.png" alt="myphoto">
            </div>

            <div class="col-6">
                <h1 class="animate__animated animate__heartBeat animate__delay-1s">CARMELO PALUMBO</h1>
                <p class="fw-light">FULL STACK WEB-DEVELOPER</p>

                <p class="fs-5">Sono nato con la passione dell'informatica e per anni ho vissuto con il desiderio di far della mia più grande passione, un lavoro.
                    Oggi, dopo tanto studio ed esperienze lavorative formative, sono pronto a dare una svolta alla mia carriera lavorativa.
                </p>

                <router-link :to="{name: 'about'}">SCOPRI DI PIÙ SU DI ME</router-link>
            </div>
        </div>


    </div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

.container{
    img{
        width: 25rem;
    }
    .col-6:first-of-type{
        border-right: .5px solid grey;
    }

    h1{
        text-align: center;
        font-weight: bolder;
        font-style: italic;
        color: $mark-text;
        -webkit-text-stroke: .5px white;
    }

    p:first-of-type{
        text-align: center;
        font-size: .85rem;
    }

    p:last-of-type{
        text-align: justify;
        width: 90%;
        margin: 0 auto;
        font-style: italic;
        font-weight: 600;
        padding: 15px 0;
    }

    a{
        display: block;
        text-align: center;
        width: 40%;
        margin: 30px auto;
        text-decoration: none;
        font-weight: bold;
        background-color: $mark-text;
        padding: 5px 10px;
        border-radius: 8px;
        -webkit-text-stroke: 1px $background;
        color: white;
        transition: .3s all;
        &:hover{
            background-color: lighten($mark-text, 10%);
        }
    }
}

</style>
