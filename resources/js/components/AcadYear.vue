<template>
    <div class="container">
        <div class="row mt-3">
          <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Academic Years</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" @click="loadDates()" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Election Dates</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Academic Years</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-primary" @click = "newModal()">Add New <i class="fas fa-user"></i></button>   
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Code</th>
                              <th >Modify</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="year in acad_years.data" :key="year.id">
                              <td >{{year.id}}</td>
                              <td>{{year.year_code}}</td>
                              <td >
                                  <a href="#" @click = "editModal(year)">
                                      <i class="fa fa-edit blue"></i>
                                  </a>
                                  <span>/</span>
                                  <a href="#" @click = "deleteYear(year.id)">
                                      <i class="fa fa-trash red"></i>
                                  </a>                        
                              </td>
                            </tr>
          
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer clearfix" style="display: block;">
                        <pagination :data="acad_years" @pagination-change-page="getResults">
                        </pagination> 
                      </div>               
                    </div>
                    <!-- /.card -->
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Election Dates</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-primary" @click = "newdateModal()">Add New <i class="fas fa-user"></i></button>   
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>Academic Year</th>
                              <th>Start Date</th>
                              <th>Start Time</th>
                              <th>End Date</th>
                              <th>End Time</th>
                              <th >Modify</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="date in electiondates.data" :key="date.id">
                              <td >{{date.year.year_code}}</td>
                              <td>{{date.start_date}}</td>
                              <td>{{date.start_time}}</td>
                              <td>{{date.end_date}}</td>
                              <td>{{date.end_time}}</td>
                              <td >
                                  <a href="#" @click = "editdateModal(date)">
                                      <i class="fa fa-edit blue"></i>
                                  </a>
                                  <span>/</span>
                                  <a href="#" @click = "deleteDate(date.id)">
                                      <i class="fa fa-trash red"></i>
                                  </a>                        
                              </td>
                            </tr>
          
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer clearfix" style="display: block;">
                        <pagination :data="electiondates" @pagination-change-page="getDates">
                        </pagination> 
                      </div>               
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>          

        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog"
            aria-labelledby="addNewModal" aria-hidden="true">
            <div class="modal-dialog model-dialog-centered" role="document">
                <div class="modal-content">
                    <form @submit.prevent="editmode ? updateYear() : createYear()"> 
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmode" id="addNewModalTitle">
                            Update Academic Year 
                            </h5>
                        <h5 class="modal-title" v-show="!editmode" id="addNewModalTitle">
                            Add New Academic Year
                            </h5>    
                        <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                             
                            <div class="form-group">
                            <label>Year Code</label>  
                                    <input v-model="form.year_code" type="text"
                                    name="year_code" class="form-control">
                                    <div v-if="form.errors.has('year_code')" v-html="form.errors.get('year_code')" />
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
                        <button type="submit" v-show="editmode" class="btn btn-success">
                        Update</button>
                        <button type="submit" v-show="!editmode" class="btn btn-primary">
                        Create</button>     
                    </div>
                   
                    </form>    
                </div>
            </div>
            </div>
        <!-- end of modal -->  

        <!--Election date Modal -->
        <div class="modal fade" id="addDate" tabindex="-1" role="dialog"
            aria-labelledby="addNewModal" aria-hidden="true">
            <div class="modal-dialog model-dialog-centered" role="document">
                <div class="modal-content">
                    <form @submit.prevent="editmode ? updateDate() : createDate()"> 
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmode" id="addNewModalTitle">
                            Update Election Date 
                            </h5>
                        <h5 class="modal-title" v-show="!editmode" id="addNewModalTitle">
                            Add New Academic Year
                            </h5>    
                        <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                             
                            <div class="form-group">

                                <label>Academic Year:</label>
                                <select class="form-control" v-model="form.acad_year_id">
                                  <option 
                                      v-for="item in acad_years.data" :key="item.id"
                                      :value="item.id"
                                      :selected="item.id == form.acad_year_id">{{ item.year_code }}</option>
                                </select>
                                    <div v-if="form.errors.has('acad_year_id')" v-html="form.errors.get('acad_year_id')" />
                            </div>

                            <div class="form-group">
                            <label>Start Date</label>  
                                    <input v-model="form.start_date" type="date"
                                    name="start_date" class="form-control">
                                    <div v-if="form.errors.has('start_date')" v-html="form.errors.get('start_date')" />
                            </div>

                            <div class="form-group">
                            <label>Start Time</label>  
                                    <input v-model="form.start_time" type="time"
                                    name="start_time" class="form-control">
                                    <div v-if="form.errors.has('start_time')" v-html="form.errors.get('start_time')" />
                            </div>

                            <div class="form-group">
                            <label>End Date</label>  
                                    <input v-model="form.end_date" type="date"
                                    name="end_date" class="form-control">
                                    <div v-if="form.errors.has('end_date')" v-html="form.errors.get('end_date')" />
                            </div>

                            <div class="form-group">
                            <label>End Time</label>  
                                    <input v-model="form.end_time" type="time"
                                    name="end_time" class="form-control">
                                    <div v-if="form.errors.has('end_time')" v-html="form.errors.get('end_time')" />
                            </div>                            

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
                        <button type="submit" v-show="editmode" class="btn btn-success">
                        Update</button>
                        <button type="submit" v-show="!editmode" class="btn btn-primary">
                        Create</button>     
                    </div>
                   
                    </form>    
                </div>
            </div>
            </div>
        <!-- end of date modal -->               
    </div>
</template>

<script>
    export default {
        data(){
          return{
            editmode:false,
            acad_years: {},
            electiondates: {},
            form: new Form({
                    id: '',
                    year_code : '',
                    acad_year_id: '',
                    start_date: '',
                    start_time: '',
                    end_date: '',
                    end_time: ''
            })
          }
        },
        methods: {
            getResults(page = 1) {
              this.$Progress.start();  
              axios.get('api/acad_year?page=' + page).then(({ data }) => (this.acad_years = data));
              this.$Progress.finish();
            },              
              newModal(){
                  this.editmode = false,
                  this.form.reset();
                  $('#addNew').modal('show')  
              },
              editModal(position){
                  this.editmode = true,
                  this.form.reset();
                  $('#addNew').modal('show')
                  this.form.fill(position);  
              },
              updateYear(){
                  this.$Progress.start();
                  this.form.put('api/acad_year/'+this.form.id)
                  .then(() => {
                    $('#addNew').modal('hide')
                    this.$Progress.finish();
                  toast.fire({
                      icon: 'success',
                      title: 'Updated'
                      })
                    Fire.$emit('Refresh');
                  })
                  .catch(() => {
                    this.$Progress.fail();
                  })
              },
              createYear(){
                  this.$Progress.start();
                  this.form.post('api/acad_year')
                  .then(() => {
                  $('#addNew').modal('hide')
                  this.$Progress.finish();                                      
                  toast.fire({
                      icon: 'success',
                      title: 'Year created successfully'
                      })
                  Fire.$emit('Refresh');      
                  })
                  .catch(() => {
                  this.$Progress.fail();  
                  })
              },
              deleteYear(id){
                this.$Progress.start();
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                  if (result.isConfirmed) { 
                  //send request to the server
                  this.form.delete('api/acad_year/'+id).then(() => {
                  this.$Progress.finish();
                  Swal.fire(
                    'Deleted!',
                    'Year has been deleted.',
                    'success'
                  )
                  Fire.$emit('Refresh');                     
                  }).catch(() => {
                  this.$Progress.fail();  
                    Swal.fire(
                    'Failed!',
                    'There was something wrong.',
                    'warning'
                  )
                  });
                  }

                })
              },
              //methods for dates
             getDates(page = 1) {
              this.$Progress.start();  
              axios.get('api/electiondate?page=' + page).then(({ data }) => (this.electiondates = data));
              this.$Progress.finish();
            },              
              newdateModal(){
                  this.editmode = false,
                  this.form.reset();
                  $('#addDate').modal('show')  
              },
              editdateModal(position){
                  this.editmode = true,
                  this.form.reset();
                  $('#addDate').modal('show')
                  this.form.fill(position);  
              },
              updateDate(){
                  this.$Progress.start();
                  this.form.put('api/electiondate/'+this.form.id)
                  .then(() => {
                    $('#addDate').modal('hide')
                    this.$Progress.finish();
                  toast.fire({
                      icon: 'success',
                      title: 'Updated'
                      })
                    Fire.$emit('Refresh');
                  })
                  .catch(() => {
                    this.$Progress.fail();
                  })
              },
              createDate(){
                  this.$Progress.start();
                  this.form.post('api/electiondate')
                  .then(() => {
                  $('#addDate').modal('hide')
                  this.$Progress.finish();                                      
                  toast.fire({
                      icon: 'success',
                      title: 'Date created successfully'
                      })
                  Fire.$emit('Refresh');      
                  })
                  .catch(() => {
                  this.$Progress.fail();  
                  })
              },
              deleteDate(id){
                this.$Progress.start();
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                  if (result.isConfirmed) { 
                  //send request to the server
                  this.form.delete('api/electiondate/'+id).then(() => {
                  this.$Progress.finish();
                  Swal.fire(
                    'Deleted!',
                    'Date has been deleted.',
                    'success'
                  )
                  Fire.$emit('Refresh');                     
                  }).catch(() => {
                  this.$Progress.fail();  
                    Swal.fire(
                    'Failed!',
                    'There was something wrong.',
                    'warning'
                  )
                  });
                  }

                })
              },              
              loadYears(){
                  axios.get('api/acad_year').then(({data}) => (this.acad_years = data));
              },
              loadDates(){
                  axios.get('api/electiondate').then(({data}) => (this.electiondates = data));
              }                             
        },
        mounted() {
            this.loadYears();
            Fire.$on('Refresh',() => {this.loadYears();})
        }
    }
</script>
