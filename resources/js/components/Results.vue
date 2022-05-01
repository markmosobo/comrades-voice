<template>
    <div class="container mt-3">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Election Results (Real-time)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Position</label>
                  <select class="form-control"
                   style="width: 100%;" data-select2-id="1" tabindex="-1"
                    aria-hidden="true" v-model="form.candidate_position_id" id="candidate_position_id">
                    <option value="">Select Position</option>
                    <option 
                        v-for="item in positions" :key="item.id"
                        :value="item.id"
                        :selected="item.id == form.candidate_position_id">{{ item.name }}</option> 
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>School</label>
                  <select class="form-control"
                   style="width: 100%;" data-select2-id="1" tabindex="-1"
                    aria-hidden="true" v-model="form.candidate_school_id" id="candidate_school_id">
                    <option value="">Select School</option>
                    <option 
                        v-for="item in schools" :key="item.id"
                        :value="item.id"
                        :selected="item.id == form.candidate_school_id">{{ item.name }}</option> 
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Gender</label>
                    <select v-model="form.gender" id="gender"
                    name="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                      </select>
                    <div v-if="form.errors.has('gender')" v-html="form.errors.get('gender')" />
                </div>
                <!-- /.form-group -->
                <!-- <div class="form-group">
                    <select class="form-control" v-model="form.acad_year_id">
                      <option 
                          v-for="item in acadyears" :key="item.id"
                          :value="item.id"
                          :selected="item.id == form.acad_year_id">{{ item.name }}</option>
                    </select>
                    <div v-if="form.errors.has('acad_year_id')" v-html="form.errors.get('acad_year_id')" />
                  <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="10" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-8vtv-container"><span class="select2-selection__rendered" id="select2-8vtv-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div> -->
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <button type="button" class="btn btn-primary">Find <i class="fas fa-search"></i></button>   

          <!-- <div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div> -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Results documentation</a> for more insight and information about
            the completed elections.
          </div>
        </div>
        <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Popularity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-info">Processing</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          positions: {},
          schools: {},
          form: new Form({
            gender: '',
            acad_year: ''
          })
        }
      },
      methods: {
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
      },
        mounted() {
            this.listPositions();
            this.listSchools();
            console.log('Component mounted.')
        }
    }
</script>
