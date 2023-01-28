<script>

import axios from 'axios'

export default {
    name: "ProjectDetail",
    data(){
        return{
            project: {},
            apiUrl: 'http://127.0.0.1:8000/api/projects/',
        }
    },
    methods: {
        getapi(){
            console.log(this.apiUrl + 'detail/' + this.$route.params.slug);
            axios.get(this.apiUrl + 'detail/' + this.$route.params.slug)
            .then(result => {
                //console.log(this.$route.params.slug)
                this.project = result.data;
                //console.log(result.data);
            })
        }
    },
    mounted(){
        this.getapi();
    }
}
</script>

<template>
<div class="container text-center py-5">
    <div class="row">
        <div class="col-5">
            <img :src="project.cover_image" :alt="project.name">
        </div>
        <div class="col-6">
            <h2 class="pt-5">{{ project.name }}</h2>
        <span class="type" v-if="project.type">{{ project.type.name }}</span>
        <div class="py-3">
            <span class="technologies mx-2" v-for="item in project.technologies" :key="item.id">{{ item.name }}</span>
        </div>
            <span class="fw-light">CLIENTE &nbsp; | </span> <strong class="ps-2 fst-italic">{{ project.client_name }}</strong>
            <p class="pt-3">{{ project.summary }}</p>
        </div>
    </div>
</div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

h2{
    font-weight: bolder;
    font-size: 2.4rem;
    -webkit-text-stroke: 1px $mark-text;
}

img{
    width: 350px;
    border: 1px solid transparent;
    border-radius: 5px;
}

.col-5{
    border-right: .5px solid grey;
}

.col-6{
    padding: 0 50px;
}
</style>
