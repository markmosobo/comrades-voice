<template>
    <div class="container">
        <div class="row mt-3">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Electable Positions</h3>
                <div class="card-tools">
                 <button type="button" class="btn btn-primary" @click = "newModal">Add New <i class="fas fa-user"></i></button>   
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th >Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="position in positions.data" :key="position.id">
                      <td >{{position.id}}</td>
                      <td>{{position.name}}</td>
                      <td>{{position.code}}</td>
                      <td >
                          <a href="#" @click = "editModal(position)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          <span>/</span>
                          <a href="#" @click = "deletePosition(position.id)">
                              <i class="fa fa-trash red"></i>
                          </a>                        
                      </td>
                    </tr>
  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix" style="display: block;">
                <pagination :data="positions" @pagination-change-page="getResults">
                  	<span slot="prev-nav">&lt; Previous</span>
	                  <span slot="next-nav">Next &gt;</span>
                </pagination> 
              </div>               
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog"
            aria-labelledby="addNewModal" aria-hidden="true">
            <div class="modal-dialog model-dialog-centered" role="document">
                <div class="modal-content">
                    <form @submit.prevent="editmode ? updatePosition() : createPosition()"> 
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmode" id="addNewModalTitle">
                            Update Position 
                            </h5>
                        <h5 class="modal-title" v-show="!editmode" id="addNewModalTitle">
                            Add New Position
                            </h5>    
                        <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                            <div class="form-group">
                            <label>Name</label>  
                                    <input v-model="form.name" type="text"
                                    name="name" class="form-control">
                                    <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            </div>
                            
                            <div class="form-group">
                            <label>Position Code</label>  
                                    <input v-model="form.position_code" type="text"
                                    name="position_code" class="form-control">
                                    <div v-if="form.errors.has('position_code')" v-html="form.errors.get('position_code')" />
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
            editmode:false,
            positions: {},
            form: new Form({
                    id: '',
                    name : '',
                    position_code : ''
            })
          }
        },
        methods: {
            getResults(page = 1) {
              this.$Progress.start();  
              axios.get('api/position?page=' + page).then(({ data }) => (this.positions = data));
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
              updatePosition(){
                  this.$Progress.start();
                  this.form.put('api/position/'+this.form.id)
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
              createPosition(){
                  this.$Progress.start();
                  this.form.post('api/position')
                  .then(() => {
                  $('#addNew').modal('hide')
                  this.$Progress.finish();                                      
                  toast.fire({
                      icon: 'success',
                      title: 'Position created successfully'
                      })
                  Fire.$emit('Refresh');      
                  })
                  .catch(() => {
                  this.$Progress.fail();  
                  })
              },
              deletePosition(id){
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
                  this.form.delete('api/position/'+id).then(() => {
                  this.$Progress.finish();
                  Swal.fire(
                    'Deleted!',
                    'Position has been deleted.',
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
              loadPositions(){
                  axios.get('api/position').then(({data}) => (this.positions = data));
              }              
        },
        mounted() {
            this.loadPositions();
            Fire.$on('Refresh',() => {this.loadPositions();})
        }
    }
</script>
