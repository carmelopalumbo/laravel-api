<script>
import axios from 'axios';
import {store} from '../data/store'

export default {
    name:"SearchForm",

    data(){
        return{
            tosearch: '',
            store
        }
    },

    methods: {
        getSearchApi(){
            axios.get(store.apiUrl + '/search',{
                params: {
                    tosearch: this.tosearch
                }
            })
            .then(result => {
                this.tosearch = '';
                //console.log(result.data.projects);
                store.projects = result.data.projects
                store.showPaginate = false;
            })
        },
        getTypeSearchApi(id){
            store.isActive = id;
            //console.log(store.apiUrl + '/typesearch');
            axios.get(store.apiUrl + '/typesearch', {
                params: {
                    type_id: id
                }
            })
            .then(result => {
                //console.log(result);
                store.projects = result.data.projects
                store.showPaginate = false;
            })
        }
    }
}
</script>

<template>

    <div class="search-box d-flex justify-content-between py-4">
        <div>
            <input type="text" v-model.trim="tosearch" placeholder="Cerca un progetto . . ." @keyup.enter="getSearchApi">
            <button @click="getSearchApi"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <div class="typebox">
            <span @click="$emit('getprojects')" class="type fw-bold mx-3">Tutti i progetti</span>
            <span @click="getTypeSearchApi(item.id)" class="type mx-3 fw-bold"
            :class="{ 'active' : store.isActive === item.id }"
            v-for="item in store.types" :key="item.id">{{ item.name }}</span>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

    .search-box{
        width: 80%;
        margin: 0 auto;
        span{
            cursor: pointer;
        }
        input{
            background-color: transparent;
            border: 1px solid $mark-text;
            width: 400px;
            padding: 8px;
            border-radius: 8px;
            &::placeholder{
                color: grey;
                font-style: italic;
            }
            &:focus{
                outline: none;
                color: $mark-text;
                font-style: italic;
            }
        }

        button{
            background-color: transparent;
            color: $mark-text;
            border-radius: 10px;
            border: none;
            font-size: 1.2rem;
            font-style: italic;
            margin: 0 8px;
        }
    }

    .typebox{

        span{
            transition: .3s all;
            -webkit-text-stroke: .5px $background;
            &:hover{
                background-color: lighten($mark-text, 5%);
            }
        }
        .active{
            box-shadow: 0px 1px 14px 6px white;
        }
    }
</style>
