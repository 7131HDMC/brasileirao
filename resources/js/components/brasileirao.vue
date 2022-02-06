<script>

import axios from "axios";
import clashe from "./clashe.vue";

export default {
    data() {
        return {
            classification: {},
            teams:{},
        };
    },
    components:{
        clashe
    },
    methods: {
        async getClassification() {
            await axios.post('/classification')
                        .then(response => {
                            console.log(response);
                            this.classification = response;
                            this.teams = this.classification.data.map((team) => { return  {name:team.team_name,id: team.team_id }} );
                        }); 
        },
        getTeams(){
            return this.classification.data.map((team) => { return  {name:team.team_name,id: team.team_id }} );
        },
        setColor(index){
            let color = "btn-outline-danger";
            if(index < 4)
                color = "btn-outline-success";
            else if(index < 6)
                color="btn-outline-primary";
            else if(index < 16)
                color="btn-outline-info";
                
            return color;
        }
            
    },
    async created() {
        await this.getClassification();
    },

}
</script>
<template >
    <div>

        <div class="tab-content" style="font-weight: 800;">
            <div>
                <label
                    class="btn btn-sm btn-outline-success"
                    align="center"
                    style="cursor: pointer; float:center;"
                >
                    <span
                    data-toggle="modal"
                    tabindex="-1"
                    data-target="#modalAddClashe"
                    data-whatever="@mdo"
                    @click="$refs.addClashe.showModal()"
                    ><i class="fa fa-plus"></i>
                    Inserir Confronto
                    </span>
                </label>
            </div>
            
            <div class="col-lg-12">
                <div class="card card-outline-info">
                <div class="card-block">
                    <table class="table align-self-center" style="overflow-y: scroll">
                        <th class="col"> 
                            Posição 
                        </th>
                        <th class="col"> PTS </th>
                        <th class="col"> J </th>
                        <th class="col"> V </th>
                        <th class="col"> E </th>
                        <th class="col"> D </th>
                        <th class="col"> GP </th>
                        <th class="col"> GC </th>
                        <th class="col"> SG </th>
                        <tbody>
                            <tr v-for="(classification, index) in classification.data" v-bind:key="classification.team_id" >
                                <td>
                                    <span :class="
                                        setColor(index)
                                    " >
                                        {{index+1}}º
                                    </span>
                                    <img :src="classification.team_flag" height="35" width="35" alt="">
                                    <span> {{ classification.team_name }}</span>
                                </td>
                                <td>{{ classification.PTS }}</td>
                                <td>{{ classification.J }}</td>
                                <td>{{ classification.V }}</td>
                                <td>{{ classification.E }}</td>
                                <td>{{ classification.D }}</td>
                                <td>{{ classification.GP }}</td>
                                <td>{{ classification.GC }}</td>
                                <td>{{ classification.SG }}</td>


                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <!-- <pagination :data="invoice" @pagination-change-page="fetch"></pagination> -->
            </div>
        </div>

        <clashe
            ref="addClashe"
            :teams="this.getTeams()"
        >
        </clashe>
    </div>
</template>

<style lang="">
    
</style>