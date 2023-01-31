<script>
import axios from 'axios';

export default {
    name: "Contacts",

    data(){
        return{
            name: '',
            email: '',
            message: '',
            errors: {},
            isLoading: false,
            showForm: true
        }
    },

    methods: {
        sendMail(){
            this.isLoading = true;
            const data = {
                name: this.name,
                email: this.email,
                message: this.message
            }

            axios.post('http://127.0.0.1:8000/api/contacts', data)
                .then(result => {
                    //console.log(data);
                    this.isLoading = false
                    if(!result.data.is_valid){
                        //console.log(result.data.errors);
                        this.errors = result.data.errors
                    }else{
                        //svuoto form
                        this.name = '';
                        this.email = '';
                        this.message = '';
                        this.errors = {};
                        this.showForm = false;
                    }
                })
        }
    }
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

    <div v-if="showForm" class="container animate__animated animate__backInLeft animate__delay-1s">
        <h3 class="text-center pt-5 pb-2">. . . E CONTATTAMI PER QUALSIASI RICHIESTA !</h3>

        <form class="w-50 m-auto py-4" @submit.prevent="sendMail()">

            <div class="mb-4">
                <label for="name" class="form-label">Nome</label>
                <input :class="{'is-invalid' : errors.name}" type="text" v-model.trim="name" class="form-control" id="name" placeholder="Inserisci il tuo nome . . . ">
                <p class="invalid-feedback" v-for="(error, index) in errors.name" :key="'name' + index">{{ error }}</p>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input :class="{'is-invalid' : errors.email}" type="text" v-model.trim="email" class="form-control" id="email" placeholder="Inserisci la tua email . . . ">
                <p class="invalid-feedback" v-for="(error, index) in errors.email" :key="'name' + index">{{ error }}</p>
            </div>

            <div class="mb-4">
                <label for="message" class="form-label">Messaggio</label>
                <textarea :class="{'is-invalid' : errors.message}" class="form-control" placeholder="Messaggio . . ." v-model.trim="message" id="message" rows="3"></textarea>
                <p class="invalid-feedback" v-for="(error, index) in errors.message" :key="'name' + index">{{ error }}</p>
            </div>

            <button :disabled="isLoading" type="submit">{{ isLoading ? 'STO INVIANDO . . .' : 'INVIA'}}</button>
        </form>
    </div>

    <div v-else class="container">
        <h5 class="text-center">RICHIESTA INVIATA, TI RISPONDERÒ IL PRIMA POSSIBILE, GRAZIE!</h5>
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

        form{
            button{
                display: block;
                margin: 10px auto;
                background-color: transparent;
                color: $mark-text;
                border: 2px solid $mark-text;
                padding: 5px 18px;
                font-weight: bold;
                border-radius: 5px;
            }

            input, textarea{
                background-color: transparent;
                border: 1px solid $mark-text;
                color: whitesmoke;
                &::placeholder{
                    font-style: italic;
                    font-weight: lighter;
                }
                &:focus{
                    box-shadow: none;
                }
            }

            label{
                padding-left: 5px;
                font-size: .9rem;
                font-weight: bold;
            }
        }

        h5{
            color: $mark-text;
            font-weight: bolder;
            -webkit-text-stroke: 1px $background;
            font-size: 1.3rem;
            background-color: lighten($mark-text, 45%);
            width: 55%;
            margin: 30px auto;
            padding: 20px 30px;
            border-radius: 15px;
            border: 3px solid $mark-text;
        }

        .is-invalid{
            border: 1px solid red;
        }

        .invalid-feedback{
            padding-left: 5px;
            font-style: italic;
        }
    }
</style>
