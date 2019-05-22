@extends('layouts.admin')

@section('title', 'Edit Navigation')


@section('content')

    @php $item = $nav_button; @endphp

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Navigation</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/nav-buttons">Navigation</a></li>
                <li class="breadcrumb-item active">Edit Navigation</li>
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
                            <h3 class="card-title">Edit Navigation</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('admin.partials.forms.errors')
                            @if(empty($nav_button))
                            <form action="/admin/nav-buttons" method="post" enctype="multipart/form-data">
                            @else
                            <form action="/admin/nav-buttons/{{$nav_button->id}}" method="post" enctype="multipart/form-data">
                                @method('Patch')
                            @endif
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name', $nav_button->name)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="link" type="text" class="form-control" id="link-input" placeholder="Link" value="{{old('link', $nav_button->link)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="page_id" class="form-control select2" id="page-select">
                                                    <optgroup label="Your Custom Pages">
                                                        @foreach($pages as $page)
                                                        <option @if(old('page_id', $nav_button->page_id) == $page->id) selected="selected" @endif data-link="/pages/{{$page->slug}}" value="{{$page->id}}">{{$page->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Pre-built Pages">
                                                        {{-- static pages --}}
                                                        <option @if(old('page_id', $nav_button->link) == "") selected="selected" @endif data-link="" value="">Blank</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/") selected="selected" @endif data-link="/" value="">Home</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/resources/bylaws") selected="selected" @endif data-link="/resources/bylaws" value="">Bylaws / Minutes / Police Act</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/resources/goals") selected="selected" @endif data-link="/resources/goals" value="">Strategic Goals / Business Plan</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/members") selected="selected" @endif data-link="/members" value="">Our Members</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/board") selected="selected" @endif data-link="/board" value="">Board Members</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/communications/questions") selected="selected" @endif data-link="/communications/questions" value="">Ask The Members</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/resources") selected="selected" @endif data-link="/resources" value="">Resources</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/communications/questions") selected="selected" @endif data-link="/communications/questions" value="">Ask The Members</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/communications/topics") selected="selected" @endif data-link="/communications/topics" value="">Hot Topics</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/communications/newsletters") selected="selected" @endif data-link="/communications/newsletters" value="">Newsletters</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/conferences") selected="selected" @endif data-link="/conferences" value="">Upcoming Conference</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/conferences/affiliate") selected="selected" @endif data-link="/conferences/affiliate" value="">Affiliate Conference</option>
                                                        <option @if(old('page_id', $nav_button->link) == "/portal") selected="selected" @endif data-link="/portal" value="">Board Portal</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="parent_id" class="form-control select2" >
                                                    <option @if(old('parent_id', $nav_button->parent_id) == null) selected="selected" @endif value="">- TOP LEVEL -</option>
                                                        @foreach($nav_buttons->sortBy('sort_order') as $button)
                                                            <option @if(old('parent_id', $nav_button->parent_id) == $button->id) selected="selected" @endif value="{{ $button->id }}">
                                                                {{$button->name }}
                                                            </option>

                                                            @if($button->has_children)
                                                                @php $level = 1; @endphp
                                                                @foreach($button->children->sortBy('sort_order') as $c)
                                                                    <option @if(old('parent_id', $nav_button->parent_id) == $c->id) selected="selected" @endif value="{{ $c->id }}">
                                                                        @for($i = 0; $i < $level; $i++)
                                                                            &rarr;
                                                                        @endfor
                                                                        {{$c->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input name="sort_order" type="text" class="form-control" placeholder="Sort Order" value="{{old('sort_order', $nav_button->sort_order)}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="active" class="form-control" >
                                                    <option @if(old('active', $nav_button->active)=="1") selected="selected" @endif value="1">Active</option>
                                                    <option @if(old('active', $nav_button->active)=="0") selected="selected" @endif value="0">Hidden</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/nav-buttons" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save Navigation</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#page-select').change(function(){
                var link = $(this).find(":selected").data('link');
                if(link.length > 0)
                {
                    $('#link-input').val(link);
                }
			});
		});
    </script>

    <script>
        $('.select2').select2();
    </script>
@stop

