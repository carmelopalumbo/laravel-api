<script>

import axios from "axios";
import ProjectCard from "../components/ProjectCard.vue";

export default {
  name: "Projects",
  components: {
    ProjectCard
  },

  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/projects',
      projects: [],
      pagination: {
        currentPage: 1,
        lastPage: null
      }
    }
  },

  methods: {
    getApi(page){
      this.pagination.currentPage = page;
      axios.get(this.apiUrl, {
        params: {
          page: this.pagination.currentPage
        }
      })
      .then(result => {
        //console.log(result.data);
        this.projects = result.data.projects.data;
        this.pagination.currentPage = result.data.projects.current_page;
        this.pagination.lastPage = result.data.projects.last_page;
        console.log(this.projects);
      })
    }
  },

  mounted(){
    this.getApi(1);
  }
}
</script>

<template>
  <div class="container pt-3">
    <div class="row">
      <div class="col-4" v-for="project in projects" :key="project.id">
        <ProjectCard :project="project"/>
      </div>
    </div>
    <div class="d-flex justify-content-center py-5">
      <button :disabled="pagination.currentPage === 1" @click="getApi(1)" class="btn-symbol">&leftarrowtail;</button>
      <button :disabled="pagination.currentPage === 1" @click="getApi(--pagination.currentPage)" class="btn-symbol"> &leftarrow; </button>
      <button :disabled="pagination.currentPage === item" @click="getApi(item)" class="mx-2 btn btn-number" v-for="item in pagination.lastPage" :key="item">{{ item }}</button>
      <button :disabled="pagination.currentPage === pagination.lastPage" @click="getApi(++pagination.currentPage)" class="btn-symbol">&rightarrow;</button>
      <button :disabled="pagination.currentPage === pagination.lastPage" @click="getApi(pagination.lastPage)" class="btn-symbol">&rightarrowtail;</button>
    </div>
  </div>

</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

.btn-number, .btn-symbol{
    border: 1px solid $mark-text;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: white;
    font-weight: bold;
}

.btn-number{
    background-color: transparent;
}
.btn-symbol{
    background-color: $mark-text;
    margin: 0 10px;
    &:disabled{
        opacity: .5;
    }
}
</style>
