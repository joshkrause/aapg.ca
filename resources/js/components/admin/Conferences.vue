<template>
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Conferences</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
                <li class="breadcrumb-item active">Conferences</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Conferences</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" @click="newModal">
                        Add Conference <i class="fa fa-user-plus fw"></i>
                    </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Active</th>
                            <th>Live</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="conference in conferences" :key="conference.id">
                            <td>{{conference.id}}</td>
                            <td>{{conference.title}}</td>
                            <td>{{conference.active | boolYN}}</td>
                            <td>{{conference.live | dateClean}}</td>
                            <td>
                                <a @click="editConference(conference)" href="#"><i class="fa fa-edit"></i></a>
                                <a @click="deleteConference(conference.id)" href="#"><i class="fa fa-trash-alt"></i></a>
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
                    <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New Conference</h5>
                    <h5 v-show="editMode" class="modal-title" id="addNewLabel">Edit Conference</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateConference() : createConference()">
                    <div class="modal-body">
                        <div class="input-group form-group">
                            <input v-model="form.title" type="text" class="form-control" :class="{'is-invalid': form.errors.has('title') }" placeholder="Title">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <datepicker v-model="form.start" name="start" :bootstrap-styling="true" :class="{'is-invalid': form.errors.has('start') }" :format="format" placeholder="Start Date"></datepicker>
                            <has-error :form="form" field="start"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <datepicker v-model="form.end" name="end" :bootstrap-styling="true" :class="{'is-invalid': form.errors.has('end') }" :format="format" placeholder="End Date" ></datepicker>
                            <has-error :form="form" field="end"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <datepicker v-model="form.live" name="live" :bootstrap-styling="true" :class="{'is-invalid': form.errors.has('live') }" :format="format" placeholder="Live On Website" ></datepicker>
                            <has-error :form="form" field="live"></has-error>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" v-model="form.active" class="form-check-input" true-value="1" false-value="0" name="active">
                            <label class="form-check-label" for="active">Active On Website</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button v-show="editMode" type="submit" class="btn btn-success">Edit Conference</button>
                        <button v-show="!editMode" type="submit" class="btn btn-success">Create Conference</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    export default {

        data() {
            return {
                editMode : false,
                conferences: {},
                form: new Form({
                    id: '',
                    title: '',
                    active: '',
                    live: '',
                    start: '',
                    end: '',
                    remember: false
                }),
                format: "yyyy-MM-dd",
            }
        },
        components: {
            Datepicker
        },
        methods: {
            updateConference() {
                this.form.put('/api/conference/'+this.form.id).then(()=> {
                    $('#addNew').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Conference Updated Successfully'
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
            editConference(conference) {
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(conference);
                $('#addNew').modal('show');
            },
            deleteConference(id) {
                swal({
                    title: 'Are you sure?',
                    text: "This conference will be removed from the admin area.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value) {
                        this.form.delete('/api/conference/'+id).then(()=> {
                            swal(
                                'Deleted!',
                                'The conference has been deleted.',
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
            createConference(){
                this.$Progress.start();
                this.form.post('/api/conference')
                    .then(()=>
                    {
                        $('#addNew').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Conference Created Successfully'
                        });
                        this.$Progress.finish();
                        Fire.$emit('AfterModify');
                    })
                    .catch(()=> {
                        this.$Progress.fail();
                        toast({
                            type: 'error',
                            title: 'Conference Not Created! Please correct your errors.'
                        });
                    });
            },
            loadConferences(){

                axios.get('/api/conference').then(({data})=> (this.conferences = data.data));
            },
            newModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
            },
            editModal(conference){
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
                this.form.fill(conference);
            },
        },
        created() {
            this.loadConferences();
            Fire.$on('AfterModify', ()=> {
                this.loadConferences();
            });
        }
    }
</script>
