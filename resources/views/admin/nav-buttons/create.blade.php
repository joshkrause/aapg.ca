@extends('layouts.admin')

@section('title', 'Create Navigation')


@section('content')

    @php $item = $nav_button; @endphp

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Navigation</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/nav-buttons">Navigation</a></li>
                <li class="breadcrumb-item active">Create Navigation</li>
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
                            <h3 class="card-title">Create Navigation</h3>
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
                                                        <option data-link="/pages/{{$page->slug}}" value="">{{$page->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Pre-built Pages">
                                                        {{-- static pages --}}
                                                        <option data-link="/" value="">Home</option>
                                                        <option data-link="/contact" value="">Contact</option>
                                                        <option data-link="/news" value="">Recent News</option>
                                                        <option data-link="/conference" value="">Conference</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="parent_id" class="form-control select2" >
                                                    <option value="">- TOP LEVEL -</option>
                                                        @foreach($nav_buttons->sortBy('sort_order') as $button)
                                                            <option {{ selected($button->id, $button->parent_id) }} value="{{ $button->id }}">
                                                                {{$button->name }}
                                                            </option>

                                                            @if($button->has_children)
                                                                @php $level = 1; @endphp
                                                                @foreach($button->children->sortBy('sort_order') as $c)
                                                                    <option {{ selected($c->id, $c->parent_id) }} value="{{ $c->id }}">
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
				$('#link-input').val(link);
			});
		});
    </script>

    <script>
        $('.select2').select2();
    </script>
@stop

