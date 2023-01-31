<script>
export default {
    name: "Contacts"
}
</script>

<template>
     <div class="container animate__animated animate__backInLeft">
        <h3 class="text-center pt-5 pb-2">SEGUIMI SUI SOCIAL . . .</h3>
       <div class="socials d-flex justify-content-center py-4">
                <a target="_blank" href="https://www.facebook.com/iamcarmelopalumbo"><i
                            class="fa-brands fa-facebook"></i></a>
                 <a target="_blank" href="https://www.instagram.com/carmelopalumbo"><i
                            class="fa-brands fa-instagram"></i></a>
                 <a target="_blank" href="https://www.tiktok.com/@carmelo.palumbo"><i
                            class="fa-brands fa-tiktok"></i></a>
                <a target="_blank" href="#"><i class="fa-brands fa-linkedin"></i></a>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

    .container{
        h3{
            color: $mark-text;
            -webkit-text-stroke: .8px white;
            font-weight: bold;
        }

        a{
            background-color: transparent;
            border: 1px solid $mark-text;
            margin: 0 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: relative;
            transition: .3s all;
            &:hover{
                transform: scale(.9);
                opacity: .8;
            }
            i{
                position: absolute;
                top: 50%;
                left: 50%;
                font-size: 1.5rem;
                transform: translate(-50%, -50%);
                color: $mark-text;
                -webkit-text-stroke: .5px white;
            }
        }
    }
</style>
