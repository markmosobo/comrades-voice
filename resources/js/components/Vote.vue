<template>
    <section class="contact-section">
    <div class="container" id="vote">
        <div class="row no-gutters align-items-center">

            <div class="col-md-6 col-lg-7" id="candForm">
                <div class="contact-info">
                    <!-- <h3>A simple and transparent voting process</h3> -->
                    <p>Please choose your preferred candidate in the following categories:</p>
                    <form @submit.prevent = "vote()">
                    <h3>Student Leader</h3>
                    <div class="radio">
                        <tr  v-for="cand in pres_candidates.data" :key="cand.id">
                            <td>
                                <label>
                                <input type="radio" :value="cand.student_id"
                                 v-model="form.pres_candidate_id"
                                 :selected ="cand.student_id == form.pres_candidate_id"
                                  name="pres_candidate_id">{{cand.student.first_name}} {{cand.student.last_name}}
                                </label>
                            </td>
                        </tr>
                    </div>

                    <h3>Secretary General</h3>
                    <div class="radio">
                        <tr  v-for="cand in sec_gen_candidates.data" :key="cand.id">
                            <td>
                                <label>
                                <input type="radio" :value="cand.id"
                                 v-model="form.sec_gen_candidate_id"
                                 :selected ="cand.id == form.sec_gen_candidate_id"
                                  name="sec_gen_candidate_id">{{cand.student.first_name}} {{cand.student.last_name}}
                                </label>
                            </td>
                        </tr>
                    </div>
                    <h3>Finance</h3>
                    <div class="radio">
                        <tr  v-for="cand in fin_candidates.data" :key="cand.id">
                            <td>
                                <label>
                                <input type="radio" :value="cand.id"
                                 v-model="form.fin_candidate_id"
                                 :selected ="cand.id == form.fin_candidate_id"
                                  name="fin_candidate_id">{{cand.student.first_name}} {{cand.student.last_name}}
                                </label>
                            </td>
                        </tr>
                    </div>
                    <h3>School Rep</h3>
                    <h5>Male</h5>
                    <div class="radio">
                        <tr  v-for="cand in male_sch_candidates.data" :key="cand.id">
                            <td>
                                <label>
                                <input type="radio" :value="cand.id"
                                 v-model="form.male_sch_candidate_id"
                                 :selected ="cand.id == form.male_sch_candidate_id"
                                  name="male_sch_candidate_id">{{cand.student.first_name}} {{cand.student.last_name}}
                                </label>
                            </td>
                        </tr>
                    </div>
                    <h5>Female</h5>
                    <div class="radio">
                        <tr  v-for="cand in female_sch_candidates.data" :key="cand.id">
                            <td>
                                <label>
                                <input type="radio" :value="cand.id"
                                 v-model="form.female_sch_candidate_id"
                                 :selected ="cand.id == form.female_sch_candidate_id"
                                  name="female_sch_candidate_id">{{cand.student.first_name}} {{cand.student.last_name}}
                                </label>
                            </td>
                        </tr>
                    </div>
                    <h3>Co-curricular</h3>
                    <h5>Male</h5>
                    <div class="radio">
                        <tr  v-for="cand in male_sport_candidates.data" :key="cand.id">
                            <td>
                                <label>
                                <input type="radio" :value="cand.id"
                                 v-model="form.male_sport_candidate_id"
                                 :selected ="cand.id == form.male_sport_candidate_id"
                                  name="male_sport_candidate_id">{{cand.student.first_name}} {{cand.student.last_name}}
                                </label>
                            </td>
                        </tr>
                    </div>
                    <h5>Female</h5>
                    <div class="radio">
                        <tr  v-for="cand in female_sport_candidates.data" :key="cand.id">
                            <td>
                                <label>
                                <input type="radio" :value="cand.id"
                                 v-model="form.female_sport_candidate_id"
                                 :selected ="cand.id == form.female_sport_candidate_id"
                                  name="female_sport_candidate_id">{{cand.student.first_name}} {{cand.student.last_name}}
                                </label>
                            </td>
                        </tr>
                    </div>

                    <button class="btn btn-solid" type="submit">Vote</button>

                </form>  
                </div>
            </div>


        </div>
    </div>
    </section>
</template>

<script>
    export default {
        data(){
            return{
                editmode: false,
                pres_candidates: {},
                sec_gen_candidates: {},
                fin_candidates: {},
                male_sch_candidates: {},
                female_sch_candidates: {},
                male_sport_candidates: {},
                female_sport_candidates: {},
                form: new Form({
                    id: '',
                    pres_candidate_id: '',
                    sec_gen_candidate_id: '',
                    fin_candidate_id: '',
                    male_sch_candidate_id: '',
                    female_sch_candidate_id: '',
                    male_sport_candidate_id: '',
                    female_sport_candidate_id: '',
                    image: '',
                    slug: ''
                })
            }
        },
        methods: {
            vote(){
                this.$Progress.start();
                this.form.post('api/vote').then(() => {
                this.$Progress.finish();                                      
                  Swal.fire({
                      icon: 'success',
                      title: 'Thank you for voting!'
                      })
                  window.location.href= "/";      
                  })
                  .catch(() => {
                  this.$Progress.fail(); 
                  toast.fire({
                      icon: 'fail',
                      title: 'Please ensure to fill all required categories!'
                      })                   
                  })
            },
            loadPresCandidates(){
                axios.get('api/pres_candidate').then(({data}) => (this.pres_candidates = data));
            },
            loadSecGenCandidates(){
                axios.get('api/sec_gen_candidate').then(({data}) => (this.sec_gen_candidates = data));
            },
            loadFinCandidates(){
                axios.get('api/fin_candidate').then(({data}) => (this.fin_candidates = data));
            },
            loadMaleSchoolCandidates(){
                axios.get('api/male_sch_candidate').then(({data}) => (this.male_sch_candidates = data));
            },
            loadFemaleSchoolCandidates(){
                axios.get('api/female_sch_candidate').then(({data}) => (this.female_sch_candidates = data));
            },
            loadMaleSportCandidates(){
                axios.get('api/male_sport_candidate').then(({data}) => (this.male_sport_candidates = data));
            },
            loadFemaleSportCandidates(){
                axios.get('api/female_sport_candidate').then(({data}) => (this.female_sport_candidates = data));
            },
        },
        mounted() {
            this.loadPresCandidates();
            this.loadSecGenCandidates();
            this.loadFinCandidates();
            this.loadMaleSchoolCandidates();
            this.loadFemaleSchoolCandidates();
            this.loadMaleSportCandidates();
            this.loadFemaleSportCandidates();
            console.log('Component mounted.')
        }
    }
</script>
