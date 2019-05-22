{{--
	parameters
	button: a NavButton
	--}}

<li class="dd-item" data-id="{{$button->id}}">
	<div class="dd-handle">{{$button->sort_order}}. {{$button->name}} 
	@if(!$button->active)<span class="badge badge-danger">inactive</span>@endif
	</div>
	@if($button->has_children)
		<ol class="dd-list">
		    @foreach($button->children->sortBy('sort_order') as $c)
		        @component('admin.nav-buttons.components.recursive-nested', ['button' => $c])
		        @endcomponent
		    @endforeach
		</ol>
	@endif
</li>