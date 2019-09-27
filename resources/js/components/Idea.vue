<template>
    <div>
    <h2 align="center" class="mt-5 mb-3">Captura tus ideas</h2>
    <div class="jumbotron ml-5 mr-5">
        <h4>En que estas pensando?</h4>
        <form action="">
            <div class="input-group">
                <input type="text" name=""
                       id="" class="form-control input-sm"
                       maxlength="256">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">
                        Agregar
                    </button>
                </span>
            </div>
        </form>
        <hr>
        <ul class="list-unstyled">
            <li v-for="idea in ideas">
                <p>
                    <small class="text-muted">
                        <em>{{ idea.created_at }}</em>
                    </small>
                    {{ idea.description }}
                </p>
            </li>
        </ul>
    </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                ideas: []
            }
        },
        created(){
          this.getIdeas();
        },
        methods: {
            getIdeas: async function () {
                var urlIdeas = 'mis-ideas';
                try{
                    var ideas = await axios.get(url);
                }catch(e){
                    console.log(e);
                }
            }
        }
    }
</script>

<style>
    .title{
        font-size: 5rem;
    }
</style>
