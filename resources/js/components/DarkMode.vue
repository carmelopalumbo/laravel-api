<script>
export default {
    name: "DarkMode",

    methods: {
        getDarkMode(){
            var checkbox = document.querySelector('input[name=mode]');

            checkbox.addEventListener('change', function() {
                if(this.checked) {
                    trans()
                    document.getElementById('lightdark').setAttribute('data-theme', 'dark')
                } else {
                    trans()
                    document.getElementById('lightdark').setAttribute('data-theme', 'light')
                }
            })

            let trans = () => {
                document.getElementById('lightdark').classList.add('transition');
                window.setTimeout(() => {
                    document.getElementById('lightdark').classList.remove('transition');
                }, 1000)
            }
        }
    },

    mounted(){
        this.getDarkMode()
    }
}
</script>

<template>
   <div class="dark-box d-flex">
       <i class="fa-solid fa-moon mx-3"></i>
       <input class="container_toggle" type="checkbox" id="switch" name="mode">
       <label for="switch">Toggle</label>
       <i class="fa-regular fa-lightbulb mx-3"></i>
    </div>
</template>

<style lang="scss">
@import '../../scss/partials/vars.scss';

.dark-box{
    i{
      font-size: 1.6rem;
      color: goldenrod;
      -webkit-text-stroke: 1px $background;
    }
}
body[data-theme='light'] {
   background: $background;
  --lightBtn: #1DB954;
  --lightColor: #fff;
  input:checked + label {
  background: $mark-text;
    }
}

body[data-theme='dark'] {
   background: whitesmoke;
   --lightBtn: #1DB954;
  --lightBg: white;
  color: $background;
  h3{
     color: $background;
  }
  .btn-number{
    color: $background;
  }
  span{
    color: white;
  }

  .client{
     color: $background;
  }
}

input[type=checkbox] {
  height: 0;
  width: 0;
  visibility: hidden;
}

label {
  cursor: pointer;
  text-indent: -9999px;
  width: 55px;
  height: 30px;
  background: var(--lightBtn);
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
  position: relative;
}

label:after {
  content: '';
  background: whitesmoke;
  width: 20px;
  height: 20px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
  top: 5px;
  left: 4px;
 transition: cubic-bezier(0.68, -0.55, 0.27, 01.55) 320ms;
}

input:checked + label:after {
  left: calc(100% - 5px);
  -webkit-transform: translateX(-100%);
  -moz-transform: translateX(-100%);
  -ms-transform: translateX(-100%);
  -o-transform: translateX(-100%);
  transform: translateX(-100%);
}

body.transition,
body.transition *,
body.transition *:before,
body.transition *:after {
  transition: cubic-bezier(0.68, -0.55, 0.27, 01.55) 420ms!important;
  transition-delay: 0!important;
}
</style>
