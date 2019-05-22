{{--
	parameters
	button: a NavButton
	--}}

<li class="list-group-item">
	<div>{{$button->name}}</div>

	@if($button->has_children)
		<ol class="list-group">
	    @foreach($button->children->sortBy('sort_order') as $c)
	        @component('nav-buttons.components.recursive-ol', ['button' => $c])
	        @endcomponent
	    @endforeach
		</ol>

	@endif
</li>