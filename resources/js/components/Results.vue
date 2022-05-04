<template>
    <div class="container">
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Election Results (real-time)</h5>

                <div class="card-tools">
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" @click="loadPresidential()" data-toggle="tab">Student Leader</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" @click="loadSecGens()" data-toggle="tab">Secretary General</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" @click="loadFins()" data-toggle="tab">Finance</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_5" @click="loadSchoolReps()" data-toggle="tab">School Reps</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_6" @click="loadSportReps()" data-toggle="tab">Co-curricular Reps</a></li>
                </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                    <div class="col-md-8">
                        <p class="text-center">
                        <strong>Voting: 1 Jan, 2018 - 30 Jul, 2018</strong>
                        </p>

                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" height="180" style="height: 180px; display: block; width: 618px;" width="618" class="chartjs-render-monitor"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <p class="text-center">
                        <strong>Candidates Summary</strong>
                        </p>

                        <div class="card-footer bg-light p-0">
                          <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                Student Leader
                                <span class="float-right text-danger">
                                  {{pres_candidates_no}}</span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                Secretary General
                                <span class="float-right text-success">
                                  {{sec_gen_candidates_no}}
                                </span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                Finance
                                <span class="float-right text-warning">
                                   {{fin_candidates_no}}
                                </span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                School Reps
                                <span class="float-right text-danger">
                                  {{female_sch_candidates_no + male_sch_candidates_no }}
                                </span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                Co-curricular Reps 
                                <span class="float-right text-success">
                                  {{male_sport_candidates_no + female_sport_candidates_no}}
                                </span>
                              </a>
                            </li>                            
                          </ul>
                        </div>                       
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  <div class="card-footer">
                    <div class="row">
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">{{students_no}}</h5>
                        <span class="description-text">TOTAL STUDENTS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">{{votes_no}}</h5>
                        <span class="description-text">TOTAL CAST VOTES</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">{{positions_no}}</h5>
                        <span class="description-text">CONTESTED POSITIONS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                        <div class="description-block">
                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">{{candidates_no}}</h5>
                        <span class="description-text">TOTAL CANDIDATES</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    </div>
                  </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_2">
                      <div class="card">
                      <div class="card-header border-transparent">
                        <h3 class="card-title">Student Leader Contestants</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
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
                              <th>Gender</th>
                              <th>Votes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="cand in pres_candidates.data" :key="cand.id">
                              <td><a href="#">{{cand.year.year_code}}</a></td>
                              <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                              <td>{{cand.gender}}</td>
                              <!-- <td><span class="badge badge-danger">Delivered</span></td>
                              <td><span class="badge badge-info">Processing</span></td>
                              <td><span class="badge badge-success">Shipped</span></td> -->
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
                        <div class="float-right" style="display: block;">
                          <pagination :data="pres_candidates" @pagination-change-page="getPresResults">
                          </pagination>                
                        </div> 
                      </div>
                      <!-- /.card-footer -->
                      </div>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Voting for this category has been closed</a>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_3">
                      <div class="card">
                      <div class="card-header border-transparent">
                        <h3 class="card-title">Secretary General Contestants</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
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
                              <th>Gender</th>
                              <th>Votes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="cand in sec_gen_candidates.data" :key="cand.id">
                              <td><a href="#">{{cand.year.year_code}}</a></td>
                              <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                              <td>{{cand.gender}}</td>
                              <!-- <td><span class="badge badge-danger">Delivered</span></td>
                              <td><span class="badge badge-info">Processing</span></td>
                              <td><span class="badge badge-success">Shipped</span></td> -->
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
                        <div class="float-right" style="display: block;">
                          <pagination :data="sec_gen_candidates" @pagination-change-page="getSecGenResults">
                          </pagination>                
                        </div> 
                      </div>
                      <!-- /.card-footer -->
                      </div>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Voting for this category has been closed</a>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_4">
                      <div class="card">
                      <div class="card-header border-transparent">
                        <h3 class="card-title">Finance Contestants</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
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
                              <th>Gender</th>
                              <th>Votes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="cand in fin_candidates.data" :key="cand.id">
                              <td><a href="#">{{cand.year.year_code}}</a></td>
                              <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                              <td>{{cand.gender}}</td>
                              <!-- <td><span class="badge badge-danger">Delivered</span></td>
                              <td><span class="badge badge-info">Processing</span></td>
                              <td><span class="badge badge-success">Shipped</span></td> -->
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
                        <div class="float-right" style="display: block;">
                          <pagination :data="fin_candidates" @pagination-change-page="getFinResults">
                          </pagination>                
                        </div> 
                      </div>
                      <!-- /.card-footer -->
                      </div>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Voting for this category has been closed</a>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_5">
                    <div class="row mt-3">
                    <div class="col-lg-6">                    
                      <div class="card">
                      <div class="card-header border-transparent">
                        <h3 class="card-title">Male School Rep Contestants</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
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
                              <th>School</th>
                              <th>Votes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="cand in male_sch_candidates.data" :key="cand.id">
                              <td><a href="#">{{cand.year.year_code}}</a></td>
                              <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                              <td>{{cand.school.school_code}}</td>
                              <!-- <td><span class="badge badge-danger">Delivered</span></td>
                              <td><span class="badge badge-info">Processing</span></td>
                              <td><span class="badge badge-success">Shipped</span></td> -->
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
                        <div class="float-right" style="display: block;">
                          <pagination :data="male_sch_candidates" @pagination-change-page="getMaleSchResults">
                          </pagination>                
                        </div> 
                      </div>
                      <!-- /.card-footer -->
                      </div>
                    </div>

                    <div class="col-lg-6"> 
                      <div class="card">
                      <div class="card-header border-transparent">
                        <h3 class="card-title">Female School Rep Contestants</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
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
                              <th>School</th>
                              <th>Votes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="cand in female_sch_candidates.data" :key="cand.id">
                              <td><a href="#">{{cand.year.year_code}}</a></td>
                              <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                              <td>{{cand.school.school_code}}</td>
                              <!-- <td><span class="badge badge-danger">Delivered</span></td>
                              <td><span class="badge badge-info">Processing</span></td>
                              <td><span class="badge badge-success">Shipped</span></td> -->
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
                        <div class="float-right" style="display: block;">
                          <pagination :data="female_sch_candidates" @pagination-change-page="getFemaleSchResults">
                          </pagination>                
                        </div> 
                      </div>
                      <!-- /.card-footer -->
                      </div>  
                    </div> 

                    </div> 
                    <!-- end of row -->   
                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Voting for this category has been closed</a>
                 
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_6">
                    <div class="row mt-3">
                      <div class="col-lg-6">                    
                        <div class="card">
                        <div class="card-header border-transparent">
                          <h3 class="card-title">Male Co-curricular Rep Contestants</h3>

                          <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                              <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
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
                                <th>School</th>
                                <th>Votes</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr v-for="cand in male_sport_candidates.data" :key="cand.id">
                                <td><a href="#">{{cand.year.year_code}}</a></td>
                                <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                                <td>{{cand.school.school_code}}</td>
                                <!-- <td><span class="badge badge-danger">Delivered</span></td>
                                <td><span class="badge badge-info">Processing</span></td>
                                <td><span class="badge badge-success">Shipped</span></td> -->
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
                          <div class="float-right" style="display: block;">
                            <pagination :data="male_sport_candidates" @pagination-change-page="getMaleSportResults">
                            </pagination>                
                          </div> 
                        </div>
                        <!-- /.card-footer -->
                        </div>
                      </div>

                      <div class="col-lg-6">                     
                        <div class="card">
                        <div class="card-header border-transparent">
                          <h3 class="card-title">Female Co-curricular Rep Contestants</h3>

                          <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                              <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
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
                                <th>School</th>
                                <th>Votes</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr v-for="cand in female_sport_candidates.data" :key="cand.id">
                                <td><a href="#">{{cand.year.year_code}}</a></td>
                                <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                                <td>{{cand.school.school_code}}</td>
                                <!-- <td><span class="badge badge-danger">Delivered</span></td>
                                <td><span class="badge badge-info">Processing</span></td>
                                <td><span class="badge badge-success">Shipped</span></td> -->
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
                          <div class="float-right" style="display: block;">
                            <pagination :data="female_sport_candidates" @pagination-change-page="getFemaleSportResults">
                            </pagination>                
                          </div> 
                        </div>
                        <!-- /.card-footer -->
                        </div> 
                      </div>  
                    </div> 
                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Voting for this category has been closed</a>

                  </div>
                  <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->
              </div>
              <!-- ./card-body -->

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
    
</template>

<script>
    export default {
      data(){
        return {
          pres_candidates: {},
          sec_gen_candidates: {},
          fin_candidates: {},
          male_sch_candidates: {},
          female_sch_candidates: {},
          male_sport_candidates: {},
          female_sport_candidates: {},
          results: {},
          electiondates: {},
          pres_candidates_no: {},
          sec_gen_candidates_no: {},
          fin_candidates_no: {},
          male_sch_candidates_no: {},
          female_sch_candidates_no: {},
          male_sport_candidates_no: {},
          female_sport_candidates_no: {}, 
          positions_no: {},
          candidates_no: {},
          votes_no: {},
          students_no: {}        
        }
      },
      methods: {
        loadGeneral(){
            axios.get('api/electiondate').then(({data}) => (this.electiondates = data));
            axios.get('api/count_pres_candidate').then(({data}) => (this.pres_candidates_no = data));
            axios.get('api/count_sec_gen_candidate').then(({data}) => (this.sec_gen_candidates_no = data));
            axios.get('api/count_fin_candidate').then(({data}) => (this.fin_candidates_no = data));
            axios.get('api/count_male_sch_candidate').then(({data}) => (this.male_sch_candidates_no = data));
            axios.get('api/count_female_sch_candidate').then(({data}) => (this.female_sch_candidates_no = data));
            axios.get('api/count_male_sport_candidate').then(({data}) => (this.male_sport_candidates_no = data));
            axios.get('api/count_female_sport_candidate').then(({data}) => (this.female_sport_candidates_no = data));
            axios.get('api/count_positions').then(({data}) => (this.positions_no = data));
            axios.get('api/count_candidates').then(({data}) => (this.candidates_no = data));
            axios.get('api/count_votes').then(({data}) => (this.votes_no = data));
            axios.get('api/count_students').then(({data}) => (this.students_no = data));
        },
        loadPresidential(){
          //load candidates
            axios.get('api/pres_candidate').then(({data}) => (this.pres_candidates = data));
        },
        loadSecGens(){
            axios.get('api/sec_gen_candidate').then(({data}) => (this.sec_gen_candidates = data));
        },
        loadFins(){
            axios.get('api/fin_candidate').then(({data}) => (this.fin_candidates = data));
        },
        loadSchoolReps(){
            axios.get('api/female_sch_candidate').then(({data}) => (this.female_sch_candidates = data));
            axios.get('api/male_sch_candidate').then(({data}) => (this.male_sch_candidates = data));
        },
        loadSportReps(){
            axios.get('api/female_sport_candidate').then(({data}) => (this.female_sport_candidates = data));
            axios.get('api/male_sport_candidate').then(({data}) => (this.male_sport_candidates = data));
        },
        getPresResults(page = 1) {
          this.$Progress.start();  
          axios.get('api/pres_candidate?page=' + page).then(({ data }) => (this.pres_candidates = data));
          this.$Progress.finish();
        },
        getSecGenResults(page = 1) {
          this.$Progress.start();  
          axios.get('api/sec_gen_candidate?page=' + page).then(({ data }) => (this.sec_gen_candidates = data));
          this.$Progress.finish();
        }, 
        getFinResults(page = 1) {
          this.$Progress.start();  
          axios.get('api/sec_gen_candidate?page=' + page).then(({ data }) => (this.fin_candidates = data));
          this.$Progress.finish();
        },
        getMaleSchResults(page = 1) {
          this.$Progress.start();  
          axios.get('api/male_sch_candidate?page=' + page).then(({ data }) => (this.male_sch_candidates = data));
          this.$Progress.finish();
        },
        getFemaleSchResults(page = 1) {
          this.$Progress.start();  
          axios.get('api/female_sch_candidate?page=' + page).then(({ data }) => (this.female_sch_candidates = data));
          this.$Progress.finish();
        }, 
        getMaleSportResults(page = 1) {
          this.$Progress.start();  
          axios.get('api/male_sport_candidate?page=' + page).then(({ data }) => (this.male_sport_candidates = data));
          this.$Progress.finish();
        },
        getFemaleSportResults(page = 1) {
          this.$Progress.start();  
          axios.get('api/female_sport_candidate?page=' + page).then(({ data }) => (this.female_sport_candidates = data));
          this.$Progress.finish();
        },                                              
        find(){
            axios.get('api/find').then(({data}) => (this.candidates = data));
        }        
      },
        mounted() {
            this.loadGeneral();
            console.log('Component mounted.')
        }
    }
</script>
