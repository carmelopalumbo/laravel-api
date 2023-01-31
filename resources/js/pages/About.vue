<script>
import { study, experiences } from '../data/aboutdata';

export default {
    name: "About",
    data(){
        return{
            study : study,
            experiences : experiences
        }
    }
}
</script>

<template>
     <div class="container animate__animated animate__backInLeft">
        <p class="w-75 m-auto py-4 text-center">Carmelo Palumbo nasce il 26-04-1997 e vive a Gioia Tauro, un piccolo paese in provincia di Reggio Calabria. <br>
        Dopo aver acquisito il diploma di perito tecnico, decide di intraprendere il percorso universitario presso Unical iscrivendosi al corso di Informatica dove è tutt'ora iscritto.
        Nel 2022 si iscrive al corso full time di Boolean per Full-Stack Web Developer conseguendo l'attestato di corso.
        </p>

        <div class="row w-75 m-auto box">

            <div class="study col-6">
                <h4>
                    ISTRUZIONE
                </h4>

                <div class="pb-4 item-box text-center" v-for="(item, index) in study" :key="index">
                    <h6>{{item.name}}</h6>
                    <p>{{item.date}}</p>
                    <p>{{item.place}}</p>
                </div>
            </div>

            <div class="experiences col-6">
                <h4>
                    ESPERIENZE LAVORATIVE
                </h4>

                <div class="pb-4 item-box text-center" v-for="(item, index) in experiences" :key="index">
                    <h6>{{item.title}}</h6>
                    <p>{{item.date}}</p>
                    <p>{{item.place}}</p>
                    <span class="d-block" v-for="(task, index) in item.tasks" :key="index">{{task}}</span>
                </div>

            </div>

        </div>

        <a href="https://drive.google.com/file/d/1arbuW7hDrFO_lbkp6sardRKta_yIgjpH/view?usp=share_link" target="_blank">SCARICA IL MIO CV</a>
    </div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

    p:first-of-type{
        font-style: italic;
        font-weight: lighter;
    }

    a{
        display: block;
        text-align: center;
        width: 20%;
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

    .box{
        height: 500px;
        .study, .experiences{
            border-top: .5px solid $mark-text;
            border-bottom: .5px solid $mark-text;
            height: 100%;
            overflow-y: auto;
        }
        .study{
            border-right: .5px solid grey;
        }

        h4{
            text-align: center;
            padding: 20px 0;
            font-weight: bolder;
            -webkit-text-stroke: .7px white;
            color: $mark-text;
        }
    }

    .item-box{
        h6{
            color: goldenrod;
            text-transform: uppercase;
        }

        border-bottom: .5px solid grey;
        padding: 20px 0;
        p:nth-of-type(2){
            color: goldenrod;
            font-size: 0.85rem;
        }

        span{
            background-color: lighten($mark-text, 10%);
            font-weight: lighter;
            width: 45%;
            margin: 20px auto;
            padding: 1px 15px;
            border-radius: 15px;
        }
    }
</style>
