<script>

import axios from "axios";
import ProjectCard from "../components/ProjectCard.vue";
import SearchForm from "../components/SearchForm.vue";
import { store } from "../data/store";

export default {
  name: "Projects",
  components: {
    ProjectCard,
    SearchForm
  },
  data(){
    return{
        store,
      pagination: {
        currentPage: 1,
        lastPage: null
      }
    }
  },

  methods: {
    getApi(page){
      this.pagination.currentPage = page;
      axios.get(store.apiUrl, {
        params: {
          page: this.pagination.currentPage
        }
      })
      .then(result => {
        //console.log(result.data);
        store.isActive = null;
        store.projects = result.data.projects.data;
        this.pagination.currentPage = result.data.projects.current_page;
        this.pagination.lastPage = result.data.projects.last_page;
        store.showPaginate = true;
        store.types = result.data.types;
        //console.log(store.types);
      })
    }
  },

  mounted(){
    this.getApi(1);
  }
}
</script>

<template>

    <SearchForm @getprojects="getApi(1)"/>

  <div class="container pt-3 animate__animated animate__backInLeft">
    <div class="row">
      <div class="col-4" v-for="project in store.projects" :key="project.id">
        <ProjectCard :project="project"/>
      </div>
      <div v-if="!store.projects.length" class="col-12">NESSUN PROGETTO TROVATO</div>
    </div>
  </div>

  <div v-if="store.showPaginate" class="d-flex justify-content-center py-5">
      <button :disabled="pagination.currentPage === 1" @click="getApi(1)" class="btn-symbol">&leftarrowtail;</button>
      <button :disabled="pagination.currentPage === 1" @click="getApi(--pagination.currentPage)" class="btn-symbol"> &leftarrow; </button>
      <button :disabled="pagination.currentPage === item" @click="getApi(item)" class="mx-2 btn btn-number" v-for="item in pagination.lastPage" :key="item">{{ item }}</button>
      <button :disabled="pagination.currentPage === pagination.lastPage" @click="getApi(++pagination.currentPage)" class="btn-symbol">&rightarrow;</button>
      <button :disabled="pagination.currentPage === pagination.lastPage" @click="getApi(pagination.lastPage)" class="btn-symbol">&rightarrowtail;</button>
    </div>

</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

.container{
    height: 600px;
    overflow-y: auto;
}

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

.col-12{
    color: $mark-text;
    text-align: center;
    padding-top: 20px;
    font-size: 2rem;
    font-weight: bold;
}
</style>
