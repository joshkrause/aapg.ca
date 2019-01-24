<template>
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Hot Topics</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link to="/admin">Admin</router-link></li>
                <li class="breadcrumb-item active">Hot Topics</li>
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
                <h3 class="card-title">All Posts</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" @click="newModal">
                        Add Post <i class="fa fa-user-plus fw"></i>
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
                            <th>Posted</th>
                            <th>Modify</th>
                        </tr>
                        <tr v-for="post in posts" :key="post.id">
                            <td>{{post.id}}</td>
                            <td>{{post.title}}</td>
                            <td>{{post.created_at | dateClean}}</td>
                            <td>
                                <a @click="editPost(post)" href="#"><i class="fa fa-edit"></i></a>
                                <a @click="deletePost(post.id)" href="#"><i class="fa fa-trash-alt"></i></a>
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
                    <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New Post</h5>
                    <h5 v-show="editMode" class="modal-title" id="addNewLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updatePost() : createPost()">
                    <div class="modal-body">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input v-model="form.title" type="text" class="form-control" :class="{'is-invalid': form.errors.has('title') }" placeholder="Title">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input v-model="form.content" type="text" class="form-control" :class="{'is-invalid': form.errors.has('content') }" placeholder="Content">
                            <has-error :form="form" field="content"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button v-show="editMode" type="submit" class="btn btn-success">Edit Post</button>
                        <button v-show="!editMode" type="submit" class="btn btn-success">Create Post</button>
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
                    title: '',
                    content: '',
                    featured: '',
                    active: '',
                    section: '',
                    remember: false
                })
            }
        },
        methods: {
            updatePost() {
                this.form.put('/api/post/'+this.form.id).then(()=> {
                    $('#addNew').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Post Updated Successfully'
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
            editPost(post) {
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(user);
                $('#addNew').modal('show');
            },
            deletePost(id) {
                swal({
                    title: 'Are you sure?',
                    text: "This post will be removed.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value) {
                        this.form.delete('/api/post/'+id).then(()=> {
                            swal(
                                'Deleted!',
                                'The post has been deleted.',
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
            createPost(){
                this.$Progress.start();
                this.form.post('/api/post')
                    .then(()=>
                    {
                        $('#addNew').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Post Created Successfully'
                        });
                        this.$Progress.finish();
                        Fire.$emit('AfterModify');
                    })
                    .catch(()=> {
                        this.$Progress.fail();
                        toast({
                            type: 'error',
                            title: 'Post Not Created! Please correct your errors.'
                        });
                    });
            },
            loadPost(){
                axios.get('/api/post').then(({data})=> (this.posts = data.data));
            },
            newModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
            },
            editModal(post){
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                $('#addNew').modal('show');
                this.form.fill(post);
            },
        },
        created() {
            this.loadPosts();
            Fire.$on('AfterModify', ()=> {
                this.loadPosts();
            });
        }
    }
</script>
