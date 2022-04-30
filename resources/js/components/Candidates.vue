<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Candidates</h3>

                <div class="card-tools">
                 <button type="button" class="btn btn-primary" @click = "newModal">Add New <i class="fas fa-procedures"></i></button>   
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="display: block;">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>School</th>
                      <th>Gender</th>
                      <th>Position</th>
                      <th>Year</th>
                      <th>Action</th>                     
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="cand in candidates.data" :key="cand.id">
                      <td>{{cand.student.first_name}} {{cand.student.last_name}}</td>
                      <td>{{cand.school.school_code}}</td>
                      <td>{{cand.gender | capitalize}} </td>
                      <td>{{cand.position.name}}</td>
                      <td>{{cand.acad_year | capitalize}} </td>
                      <td >
                          <a href="#" @click = "editModal(cand)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          <span>/</span>
                          <a href="#" @click = "deleteCandidate(cand.id)">
                              <i class="fa fa-trash red"></i>
                          </a>                        
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer clearfix" style="display: block;">
                <pagination :data="candidates" @pagination-change-page="getResults">
                  	<span slot="prev-nav">&lt; Previous</span>
	                  <span slot="next-nav">Next &gt;</span>
                </pagination>                
              </div>
            </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog"
            aria-labelledby="addNewModal" aria-hidden="true">
            <div class="modal-dialog model-dialog-centered" role="document">
                <div class="modal-content">
                    <form @submit.prevent="editmode ? updateCandidate() : createCandidate()"> 
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmode" id="addNewModalTitle">
                            Update Candidate
                            </h5>
                        <h5 class="modal-title" v-show="!editmode" id="addNewModalTitle">
                            Add New Candidate
                            </h5>    
                        <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                             
                            <div class="form-group">

                                <label>Candidate:</label>
                                <select class="form-control" v-model="form.candidate_id">
                                  <option value="">Select a Candidate</option>
                                  <option 
                                      v-for="student in students" :key="student.id"
                                      :value="student.id"
                                      :selected="student.id == form.candidate_id">{{ student.name }}</option>
                                </select>
                                    <div v-if="form.errors.has('candidate_id')" v-html="form.errors.get('candidate_id')" />
                            </div>  

                            <div class="form-group">

                                <label>Position:</label>
                                <select class="form-control" v-model="form.candidate_position_id">
                                  <option 
                                      v-for="item in positions" :key="item.id"
                                      :value="item.id"
                                      :selected="item.id == form.candidate_position_id">{{ item.name }}</option>
                                </select>
                                    <div v-if="form.errors.has('candidate_position_id')" v-html="form.errors.get('candidate_position_id')" />
                            </div>

                            <div class="form-group">

                                <label>School:</label>
                                <select class="form-control" v-model="form.candidate_school_id">
                                  <option 
                                      v-for="item in schools" :key="item.id"
                                      :value="item.id"
                                      :selected="item.id == form.candidate_school_id">{{ item.name }}</option>
                                </select>
                                    <div v-if="form.errors.has('candidate_school_id')" v-html="form.errors.get('candidate_school_id')" />
                            </div>

                            <div class="form-group">
                            <label>Gender</label>  
                                    <select v-model="form.gender" id="gender"
                                    name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                      </select>
                                    <div v-if="form.errors.has('gender')" v-html="form.errors.get('gender')" />
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

    </div>
</template>

<script>
    export default {
        data(){
            return{
                editmode: false,
                candidates: {},
                form: new Form({
                        id: '',
                        candidate_id: '',
                        candidate_position_id: '',
                        candidate_school_id: '', 
                        gender: ''               
                }),
                students: {},
                positions: {},
                schools: {}
            }
        },
        methods: {
            getResults(page = 1) {
              this.$Progress.start();  
              axios.get('api/candidate?page=' + page).then(({ data }) => (this.candidates = data));
              this.$Progress.finish();
            },              
              newModal(){
                  this.editmode = false,
                  this.form.reset();
                  $('#addNew').modal('show')  
              },
              editModal(candidate){
                  this.editmode = true,
                  this.form.reset();
                  $('#addNew').modal('show')
                  this.form.fill(candidate);  
              },
              updateCandidate(){
                  this.$Progress.start();
                  this.form.put('api/candidate/'+this.form.id)
                  .then(() => {
                    $('#addNew').modal('hide')
                    this.$Progress.finish();
                    toast.fire(
                    'Updated!',
                    "Candidate's information has been updated.",
                    'success'
                    )
                    Fire.$emit('Refresh');
                  })
                  .catch(() => {
                    this.$Progress.fail();
                  })
              },
              createCandidate(){
                  this.$Progress.start();
                  this.form.post('api/candidate')
                  .then(() => {
                  $('#addNew').modal('hide')
                  this.$Progress.finish();                                      
                  toast.fire({
                      icon: 'success',
                      title: 'Candidate created successfully'
                      })
                  Fire.$emit('Refresh');      
                  })
                  .catch(() => {
                  this.$Progress.fail();  
                  })
              },
              deleteCandidate(id){
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
                  this.form.delete('api/candidate/'+id).then(() => {
                  this.$Progress.finish();
                  Swal.fire(
                    'Deleted!',
                    'Candidate has been deleted.',
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
              listStudents(){
                  axios.get('api/liststudents').then((response) => {
                    this.students = response.data.data;
                    });
              },
              listPositions(){
                  axios.get('api/listpositions').then((response) => {
                    this.positions = response.data.data;
                    });
              },
              listSchools(){
                  axios.get('api/listschools').then((response) => {
                    this.schools = response.data.data;
                    });
              },
              loadCandidates(){
                  axios.get('api/candidate').then((response) => {this.candidates = response.data});
              }                            
        },
        mounted() {
            this.listPositions();
            this.listSchools();
            this.listStudents();
            this.loadCandidates();
            Fire.$on('Refresh',() => {this.loadCandidates();})
        }
    }
</script>
