<template>
<div>
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
                        <label>Conference Schedule To Modify</label>
                            <v-select v-model="conference" :options="conferences" @input="chooseConference(conference)"></v-select>
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

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Conference Schedule</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
                <li class="breadcrumb-item"><router-link to="/admin/conferences">Conferences</router-link></li>
                <li class="breadcrumb-item active">Schedule</li>
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
                <h3 class="card-title">Conference Schedue</h3>
                <div class="card-tools">
                    <button type="button" v-show="conference" class="btn btn-primary" @click="newModal">
                        Add Event <i class="fa fa-user-plus fw"></i>
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
                            <th>Start</th>
                            <th>End</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="schedule in schedules" :key="schedule.id">
                            <td>{{schedule.id}}</td>
                            <td>{{schedule.title}}</td>
                            <td>{{schedule.start | dateClean}}</td>
                            <td>{{schedule.end | dateClean}}</td>
                            <td>
                                <a @click="editSchedule(schedule)" href="#"><i class="fa fa-edit"></i></a>
                                <a @click="deleteSchedule(schedule.id)" href="#"><i class="fa fa-trash-alt"></i></a>
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
                    <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New Event</h5>
                    <h5 v-show="editMode" class="modal-title" id="addNewLabel">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateSchedule() : createSchedule()">
                    <div class="modal-body">
                        <input type="hidden" name="conference_id" v-model="form.conference_id">
                        <div class="input-group form-group">
                            <input v-model="form.title" type="text" class="form-control" :class="{'is-invalid': form.errors.has('title') }" placeholder="Title">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <textarea v-model="form.description" type="text" class="form-control" :class="{'is-invalid': form.errors.has('description') }" placeholder="Description"></textarea>
                            <has-error :form="form" field="description"></has-error>
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
                            <input v-model="form.speaker" type="text" class="form-control" :class="{'is-invalid': form.errors.has('speaker') }" placeholder="Speaker / Speakers">
                            <has-error :form="form" field="speaker"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button v-show="editMode" type="submit" class="btn btn-success">Edit Event</button>
                        <button v-show="!editMode" type="submit" class="btn btn-success">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import vSelect from 'vue-select'
    export default {

        data() {
            return {
                conference: '',
                conferences: [],
                editMode : false,
                schedules: {},
                form: new Form({
                    id: '',
                    conference_id: '',
                    title: '',
                    start: '',
                    end: '',
                    description: '',
                    speaker: '',
                    remember: false
                }),
                format: "yyyy-MM-dd",
            }
        },
        components: {
            Datepicker,
            'v-select': vSelect,
        },
        methods: {
            updateSchedule() {
                this.form.put('/api/schedule/'+this.form.id).then(()=> {
                    $('#addNew').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Event Updated Successfully'
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
            editSchedule(schedule) {
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(schedule);
                $('#addNew').modal('show');
            },
            deleteSchedule(id) {
                swal({
                    title: 'Are you sure?',
                    text: "This even will be removed from the admin area.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value) {
                        this.form.delete('/api/schedule/'+id).then(()=> {
                            swal(
                                'Deleted!',
                                'The event has been deleted.',
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
            createSchedule(){
                this.$Progress.start();
                this.form.post('/api/schedule')
                    .then(()=>
                    {
                        $('#addNew').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Event Created Successfully'
                        });
                        this.$Progress.finish();
                        Fire.$emit('AfterModify');
                    })
                    .catch(()=> {
                        this.$Progress.fail();
                        toast({
                            type: 'error',
                            title: 'Event Not Created! Please correct your errors.'
                        });
                    });
            },
            loadSchedules(conference){
                axios.get('/api/schedule/'+conference).then(({data})=> (this.schedules = data.data));
            },
            loadConferences(){
                // axios.get('/api/conference').then(({data})=> (this.conferences = data.data));
                axios.get('/api/conference')
                    .then(({data})=> (data.forEach(element => {
                        this.conferences.push({value: element.id, label: element.title});
                    })
                ));
            },
            chooseConference(conference) {
                this.form.conference_id = conference.value;
                this.loadSchedules(conference.value);
            },
            newModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                this.form.conference_id = this.conference.value;
                $('#addNew').modal('show');
            },
            editModal(schedule){
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
                this.form.fill(schedule);
            },
        },
        created() {
            this.loadConferences();
            Fire.$on('AfterModify', ()=> {
                this.loadSchedules();
            });
        }
    }
</script>
