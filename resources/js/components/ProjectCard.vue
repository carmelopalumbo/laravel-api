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
        <div class="cp-card">
            <h3>{{ project.name }}</h3>
            <p>{{ project.client_name }}</p>
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

</style>
