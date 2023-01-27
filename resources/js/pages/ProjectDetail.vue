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
<div class="container text-center">
    <h2 class="pt-5">{{ project.name }}</h2>
    <span v-if="project.type">{{ project.type.name }}</span>
    <div>
        <span v-for="item in project.technologies" :key="item.id">{{ item.name }}</span>
    </div>
    <p>{{ project.summary }}</p>
</div>
</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';
</style>
