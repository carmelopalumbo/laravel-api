<script>
export default {
    name: "ProjectCard",

    props:{
        project: Object
    }
}
</script>

<template>
    <router-link :to="{name: 'details', params:{slug: project.slug} }">
        <div class="cp-card d-flex flex-column align-items-center">
            <h3>{{ project.name }}</h3>
            <span class="type">{{ project.type.name }}</span>
            <img :src="project.cover_image" :alt="project.slug">
        </div>
    </router-link>

</template>

<style lang="scss" scoped>
@import '../../scss/partials/vars.scss';

a{
    text-decoration: none;
    color: white;
    .cp-card{
    border: 2px solid transparent;
    width: 280px;
    height: 330px;
    margin: 25px auto;
    padding: 20px;
    border-radius: 7px;
    box-shadow: 1px 1px 12px 1px $mark-text;
    transition: .3s all;
    &:hover{
        transform: scale(1.04);
    }
    h3{
        font-size: 1.3rem;
        text-align: center;
    }
    p{
        text-align: center;
        font-size: 0.9rem;
    }

}
}

img{
    width: 200px;
    border: 2px solid transparent;
    border-radius: 5px;
}

.type{
    background-color: darken($mark-text, 15%);
    padding: 3px 12px;
    font-style: italic;
    font-weight: lighter;
    border-radius: 15px;
    font-size: .8rem;
    margin: 10px 0;
}
</style>
