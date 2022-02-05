<script>

import axios from "axios";

export default {
    data() {
        return {
            classification: {},
        };
    },
    methods: {
        async getClassification() {
            await axios.post('/classification')
                        .then(response => {
                            console.log(response);
                            this.classification = response
                        }); 
        },
    },
    created() {
        this.getClassification();
    },
}
</script>
<template >
    <div>
        <div class="tab-content">

            
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
                                    <span class=" ">{{index+1}}º</span>
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
    </div>
</template>

<style lang="">
    
</style>