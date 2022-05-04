<template>
    <div class="container">
        <div class="row mt-3">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Election Analytics</h3>
                    <router-link to="/results" href="javascript:void(0);">View Results</router-link>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{students_no}}</span>
                    <span>Student Population</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span v-if="((votes_no/students_no) * 100) > 50" class="text-success">
                      <i class="fas fa-arrow-up"></i>
                       {{(votes_no/students_no) * 100}}%
                    </span>
                    <span v-else-if="((votes_no/students_no) * 100) < 50" class="text-danger">
                      <i class="fas fa-arrow-down"></i>
                       {{(votes_no/students_no) * 100}}%
                    </span>                    
                    <span class="text-muted">Voter turnout</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="visitors-chart" height="200" width="447" style="display: block; width: 447px; height: 200px;" class="chartjs-render-monitor"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Cast Votes
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Expected Votes
                  </span>
                </div>
              </div>

            <div class="card-footer bg-light p-0">
                    <br>
                    <p class="text-center">
                      <strong>Voter Turnout per School</strong>
                    </p>  
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Student Leader
                      <span class="float-right text-danger">
                        <i class="fas fa-arrow-down text-sm"></i>
                        3</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Secretary General
                      <span class="float-right text-success">
                        <i class="fas fa-arrow-up text-sm"></i> 4
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Finance
                      <span class="float-right text-warning">
                        <i class="fas fa-arrow-left text-sm"></i> 2
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      School Reps
                      <span class="float-right text-danger">
                        <i class="fas fa-arrow-down text-sm"></i>
                        20</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Co-curricular Reps
                      <span class="float-right text-success">
                        <i class="fas fa-arrow-up text-sm"></i> 5
                      </span>
                    </a>
                  </li>                  
                </ul>
              </div>                  
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Leaderboard</h3>
                  <div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div> 
                </div>  
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Academic Year</th>
                      <th>Candidate</th>
                      <th>Position</th>
                      <th>Votes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="cand in leadcandidates.data" :key="cand.id">
                      <td><a href="#">{{cand.year.year_code}}</a></td>
                      <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                      <td>
                          <span v-if="cand.position.name == 'President'" class="badge badge-success">{{cand.position.position_code}}</span>
                          <span v-if="cand.position.name == 'Secretary General'" class="badge badge-success">{{cand.position.position_code}}</span>
                          <span v-if="cand.position.name == 'Finance'" class="badge badge-success">{{cand.position.position_code}}</span>
                          <span v-if="cand.position.name == 'School Representative'" class="badge badge-info">{{cand.position.position_code}} ({{cand.school.school_code}})</span>
                          <span v-if="cand.position.name == 'Sports Representative' && cand.gender == 'M'" class="badge badge-primary">{{cand.position.position_code}} (M)</span>
                          <span v-if="cand.position.name == 'Sports Representative' && cand.gender == 'F'" class="badge badge-danger">{{cand.position.position_code}} (F)</span>
                      </td>

                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{cand.votes}}</div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <router-link to="/candidates" href="javascript:void(0)" class="btn btn-sm btn-info float-left">View All Candidates</router-link>
                <div class="float-right" style="display: block;">
                  <pagination :data="leadcandidates" @pagination-change-page="getResults">
                  </pagination>                
                </div>                
              </div>
              <!-- /.card-footer -->
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
               leadcandidates: {}, 
               students_no: {},
               votes_no: {}
            }
        },
        methods: {
            loadLeadCandidates(){
                axios.get('api/leadcandidates').then(({data}) => (this.leadcandidates = data));
            },
            loadAnalytics(){
            axios.get('api/count_students').then(({data}) => (this.students_no = data));
            axios.get('api/count_votes').then(({data}) => (this.votes_no = data));
            },
            getResults(page = 1) {
              this.$Progress.start();  
              axios.get('api/leadcandidates?page=' + page).then(({ data }) => (this.leadcandidates = data));
              this.$Progress.finish();
            }            
        },
        mounted() {
            this.loadLeadCandidates();
            this.loadAnalytics();
            console.log('Component mounted.')
        }
    }
</script>
