<script>
import axios from 'axios';


export default {
    props:[
        'Teams',
    ],
    data() {
        return {
            teams: {},
            away_team: null,
            away_gols: 0,
            home_team: null,
            home_gols: 0,
            errorSelectTeams: "",
        };
    },
    methods: {
        async getTeams() {
            await axios.post('/teams')
                        .then(response => {
                            console.log(response);
                            this.teams = response
                        }); 
        },
        async setClashe() {
            if(this.validateClashe()){
                const params = {
                    home_gols: this.home_gols,
                    home_team: this.home_team,
                    away_team: this.away_team,
                    away_gols: this.away_gols
                }
                console.log(params);
                await axios.post('/clashe',params)
                            .then(response => {

                                this.fechar();
                                console.log(response);
                                // this.$swal({
                                //     title: "Confronto Adicionado com Sucesso",
                                //     type: "success"
                                // }).then(result => {
                                    this.$parent.getClassification();
                                // });


                            }); 
            }
        },
        validateClashe() {
            let validate = true;
            if(this.away_team==null || this.home_team==null){
                validate=false;
                this.errorSelectTeams = '<div class="help-block with-errors btn-outline-danger"><span>Por favor, selecione dois times</span></div>';
            } else if (this.away_team==this.home_team) {
                validate=false;
                this.errorSelectTeams = '<div class="help-block with-errors btn-outline-danger"><span>Por favor, selecione times diferentes</span></div>';
            } else {
                this.errorSelectTeams = ""
            }
            return validate;
        },
        fechar: function() {
            this.home_gols = 0;
            this.away_gols = 0;
            this.home_team = null;
            this.away_team = null;

            $("#modalAddClashe").modal("hide");
        },
        showModal: function() {},

    },
    created() {
        this.teams = this.Teams;
        console.log(this.Teams);
        // this.getTeams();
    },
    
}
</script>
<template >
    <div style="font-weight: 900;">
        <div
            class="modal"
            id="modalAddClashe"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modalAddClasheLabel"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4
                            class="modal-title"
                            id="modalAddClasheLabel"
                        >
                            Confronto
                        </h4>
                    </div>
                     <div class="modal-body col-lg-12">
                        <div class="tab-content">
                            <div class="col-lg-12">
                                <div class="card card-outline-info">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12 ">     
                                               <label for="home_team" class="control-label">Time Casa</label>
                                                <div class="row input-group mb-3">

                                                    <span class="col-md-5">
                                                        <input 
                                                            type="number" 
                                                            v-model="home_gols"
                                                            class="form-control"
                                                            :placeholder="home_gols"
                                                        />
                                                    </span>
                                                    <select v-model="home_team" class="form-control" id="home_team">
                                                        <!-- <option value=""></option> -->
                                                        <option :value="team.id" v-for="(team, index) in teams" :key="index">
                                                            {{ team.name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <p style="text-align: center;font-size: 24px;">X</p>
                                            <div class="col-md-12">        
                                                <label for="away_team" class="control-label">Time Visitante</label>

                                                <div class="row input-group mb-3">
                                                    <span class="col-md-5">
                                                        <input 
                                                            type="number" 
                                                            v-model="away_gols"
                                                            class="form-control"
                                                            :placeholder="away_gols"
                                                        />
                                                    </span>
                                                    <select v-model="away_team" class="form-control" id="away_team">
                                                        <!-- <option value=""></option> -->
                                                        <option :value="team.id" v-for="(team, index) in teams" :key="index">
                                                            {{ team.name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>                                           
                                        </div>
                                        <span v-html="errorSelectTeams"></span>
                                        <div class="box-footer">              
                                            <div >
                                                <div class="row">
                                                    <div class="col ">
                                                        <button @click="fechar" type="reset" class="btn btn-inverse">
                                                            Cancelar
                                                        </button>								
                                                    </div>
                                             				
                                                    <div class="col">
                                                        <button @click="setClashe" data-cy="set_clashe" type="submit" class="btn btn-success mb-3">
                                                            Enviar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div> 
                            </div>
                        </div>  
                    </div>     
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="">



</style>