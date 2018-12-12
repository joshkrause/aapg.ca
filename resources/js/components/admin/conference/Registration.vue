<template>
<div>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Conference Registration</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
                <li class="breadcrumb-item"><router-link to="/admin/conferences">Conferences</router-link></li>
                <li class="breadcrumb-item active">Registration</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
    <section class="content">
    <div class="container-fluid">
            <div class="row">
            <div class="col-sm-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Choose A Conference</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Choose A Conference</label>
                                <v-select v-model="conference" :options="conferences" @input="chooseConference(conference.value)"></v-select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Attendants</h3>
                <div class="card-tools">
                    <button type="button" v-show="conference" class="btn btn-primary" @click="newModal">
                        Add Attendant <i class="fa fa-user-plus fw"></i>
                    </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Invoice</th>
                            <th>Paid Via</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="attendant in attendants" :key="attendant.id">
                            <td>{{attendant.id}}</td>
                            <td>{{attendant.customers.name}}</td>
                            <td>{{attendant.invoice_id}}</td>
                            <td>{{attendant.payment}}</td>
                            <td>
                                <a @click="editAttendant(attendant)" href="#"><i class="fa fa-edit"></i></a>
                                <a @click="deleteAttendant(attendant.id)" href="#"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        </div>
    </section>
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New Attendant</h5>
                    <h5 v-show="editMode" class="modal-title" id="addNewLabel">Edit Attendant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateAttendant() : createAttendant()">
                    <div class="modal-body">
                        <input type="hidden" name="conference_id" v-model="form.conference_id">
                        <div class="form-group">
                            <v-select v-model="customer" :options="customers" @input="chooseCustomer(customer)" placeholder="Previous Customer"></v-select>
                        </div>
                        <div class="input-group form-group">
                            <input v-model="form.name" type="text" class="form-control" :class="{'is-invalid': form.errors.has('name') }" placeholder="Name">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <input v-model="form.company" type="text" class="form-control" :class="{'is-invalid': form.errors.has('company') }" placeholder="Company">
                            <has-error :form="form" field="company"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <input v-model="form.email" type="text" class="form-control" :class="{'is-invalid': form.errors.has('email') }" placeholder="Email">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <input v-model="form.phone" type="text" class="form-control" :class="{'is-invalid': form.errors.has('phone') }" placeholder="Phone">
                            <has-error :form="form" field="phone"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <textarea v-model="form.address" type="text" class="form-control" :class="{'is-invalid': form.errors.has('address') }" placeholder="Full Address"></textarea>
                            <has-error :form="form" field="address"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button v-show="editMode" type="submit" class="btn btn-success">Edit Attendant</button>
                        <button v-show="!editMode" type="submit" class="btn btn-success">Create Attendant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>


    export default {

        data() {
            return {
                conference: '',
                conferences: [],
                customers: [],
                customer: '',
                editMode : false,
                attendants: {},
                form: new Form({
                    id: '',
                    conference_id: '',
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    company: '',
                    remember: false
                }),
                dateFormat: "yyyy-MM-dd",
            }
        },
        components: {
            // 'vue-ctk-date-time-picker': VueCtkDateTimePicker,
        },
        methods: {
            updateAttendant() {
                this.form.put('/api/atendee/'+this.form.id).then(()=> {
                    $('#addNew').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Attendant Updated Successfully'
                    });
                    this.$Progress.finish();
                    Fire.$emit('AfterModify');
                }).catch(()=>{
                    this.$Progress.fail();
                    swal(
                        'Failed!',
                        'There was an error.',
                        'error'
                    )
                });
            },
            editAttendant(attendant) {
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(attendant);
                $('#addNew').modal('show');
            },
            deleteAttendant(id) {
                swal({
                    title: 'Are you sure?',
                    text: "This attendant will be removed.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value) {
                        this.form.delete('/api/attendant/'+id).then(()=> {
                            swal(
                                'Deleted!',
                                'The attendant has been deleted.',
                                'success'
                            )
                            Fire.$emit('AfterModify');
                        }).catch(()=> {
                            swal(
                                'Failed!',
                                'There was an error.',
                                'error'
                            )
                        });
                    }
                })
            },
            createAttendant(){
                this.$Progress.start();
                this.form.post('/api/attendant')
                    .then(()=>
                    {
                        $('#addNew').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Attendant Created Successfully'
                        });
                        this.$Progress.finish();
                        Fire.$emit('AfterModify');
                    })
                    .catch(()=> {
                        this.$Progress.fail();
                        toast({
                            type: 'error',
                            title: 'Attendant Not Created! Please correct your errors.'
                        });
                    });
            },
            loadAttendants(conference){
                axios.get('/api/conference/'+conference+'/attendants')
                    .then( ({data}) => (this.attendants = data));

            },
            loadConferences(){
                // axios.get('/api/conference').then(({data})=> (this.conferences = data.data));
                axios.get('/api/conference/upcoming')
                    .then(({data})=> (data.forEach(element => {
                        this.conferences.push({value: element.id, label: element.title});
                    })
                ));
            },
            chooseConference(conference) {
                if(conference)
                {
                    this.form.conference_id = conference;
                    this.loadAttendants(conference);
                }
            },
            chooseCustomer(customer) {
                if(customer)
                {
                    this.form.customer_id = customer.value;
                    this.loadAttendants(customer.value);
                }
            },
            loadCustomers(){
                axios.get('/api/customer')
                    .then(({data})=> (data.forEach(element => {
                        this.customers.push({value: element.id, label: element.name + " " + element.company});
                    })
                ));
            },
            newModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                this.form.conference_id = this.conference.value;
                $('#addNew').modal('show');
            },
            editModal(attendant){
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
                this.form.fill(attendant);
            },
        },
        created() {
            this.loadConferences();
            Fire.$on('AfterModify', ()=> {
                this.loadAttendants(conference);
            });
        }
    }
</script>
