<template>
    <div>
    <h2 align="center" class="mt-5 mb-3">Captura tus ideas</h2>
    <div class="jumbotron ml-5 mr-5">
        <h4>En que estas pensando?</h4>
        <form v-on:submit.prevent="createIdea">
            <div class="input-group">
                <input type="text" name=""
                       id="" class="form-control input-sm"
                       maxlength="256" v-model="newIdea">
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
                        <em>{{ since(idea.created_at) }}</em>
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
    import toastr from 'toastr';
    import moment from 'moment';

    moment.lang('es');

    export default {
        data(){
            return {
                ideas: [],
                newIdea: ''
            }
        },
        created(){
          this.getIdeas();
        },
        methods: {
            since(d){
                return moment(d).fromNow();
            },
            getIdeas: async function () {
                var urlIdeas = 'mis-ideas';
                try{
                    var ideas = await axios.get(urlIdeas);
                    this.ideas = ideas.data;
                }catch(e){
                    console.log(e);
                }
            },
            async createIdea(){
                var urlIdeas = 'mis-ideas';
                try{
                    var post = {
                        description: this.newIdea
                    }
                    await axios.post(urlIdeas,post);
                    this.getIdeas();
                    toastr.success('Se agrego la tarea '+ this.newIdea);
                    this.newIdea = '';
                }catch(e){
                    toastr.error('Error: '+e);
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
