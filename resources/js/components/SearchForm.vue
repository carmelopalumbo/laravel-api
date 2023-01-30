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
                console.log(result.data.projects);
                store.projects = result.data.projects
                store.showPaginate = false;
            })
        }
    }
}
</script>

<template>

    <div class="search-box d-flex justify-content-center py-4">
        <input type="text" v-model.trim="tosearch" placeholder="Cerca un progetto . . ." @keyup.enter="getSearchApi">
        <button @click="getSearchApi"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

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
        border: 1px solid $mark-text;
        font-size: .9rem;
        padding: 5px 13px;
        font-style: italic;
        margin: 0 5px;
    }
</style>
