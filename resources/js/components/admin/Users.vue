<template>
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
                <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">All Users</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" @click="newModal">
                        Add User <i class="fa fa-user-plus fw"></i>
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
                            <th>Email</th>
                            <th>Registered</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{user.id}}</td>
                            <td>{{user.name}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.created_at | dateClean}}</td>
                            <td>
                                <a @click="editUser(user)" href="#"><i class="fa fa-edit"></i></a>
                                <a @click="deleteUser(user.id)" href="#"><i class="fa fa-trash-alt"></i></a>
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
                    <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New User</h5>
                    <h5 v-show="editMode" class="modal-title" id="addNewLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateUser() : createUser()">
                    <div class="modal-body">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input v-model="form.name" type="text" class="form-control" :class="{'is-invalid': form.errors.has('name') }" placeholder="Name">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input v-model="form.email" type="email" class="form-control" :class="{'is-invalid': form.errors.has('email') }" placeholder="Email">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input v-model="form.password" type="password" class="form-control" :class="{'is-invalid': form.errors.has('password') }" placeholder="Password">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input v-model="form.password_confirmation" type="password" class="form-control" :class="{'is-invalid': form.errors.has('password_confirmation') }" placeholder="Password Again">
                            <has-error :form="form" field="password_confirmation"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button v-show="editMode" type="submit" class="btn btn-success">Edit User</button>
                        <button v-show="!editMode" type="submit" class="btn btn-success">Create User</button>
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
                editMode : false,
                users: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    remember: false
                })
            }
        },
        methods: {
            updateUser() {
                this.form.put('/api/user/'+this.form.id).then(()=> {
                    $('#addNew').modal('hide');
                    toast({
                        type: 'success',
                        title: 'User Updated Successfully'
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
            editUser(user) {
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(user);
                $('#addNew').modal('show');
            },
            deleteUser(id) {
                swal({
                    title: 'Are you sure?',
                    text: "This user will be removed from the admin area.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value) {
                        this.form.delete('/api/user/'+id).then(()=> {
                            swal(
                                'Deleted!',
                                'The user has been deleted.',
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
            createUser(){
                this.$Progress.start();
                this.form.post('/api/user')
                    .then(()=>
                    {
                        $('#addNew').modal('hide');
                        toast({
                            type: 'success',
                            title: 'User Created Successfully'
                        });
                        this.$Progress.finish();
                        Fire.$emit('AfterModify');
                    })
                    .catch(()=> {
                        this.$Progress.fail();
                        toast({
                            type: 'error',
                            title: 'User Not Created! Please correct your errors.'
                        });
                    });
            },
            loadUsers(){
                axios.get('/api/user').then(({data})=> (this.users = data.data));
            },
            newModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
            },
            editModal(user){
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
        },
        created() {
            this.loadUsers();
            Fire.$on('AfterModify', ()=> {
                this.loadUsers();
            });
        }
    }
</script>
