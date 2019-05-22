{{--
	parameters
	button: a NavButton
	level: integer to count depth of recursion
	value: the id of a NavButton that should select the option with that id
	--}}

<option {{ selected($button->id, $value) }} value="{{ $button->id }}">
	@for($i = 0; $i < $level; $i++)
	&rarr;
	@endfor
	{{$button->name }}
</option>

@if($button->has_children)
	@php $level = $level +1; @endphp
    @foreach($button->children->sortBy('sort_order') as $c)
        @component('admin.nav-buttons.components.recursive-option', ['button' => $c, 'level' =>$level, 'value' => $value])
        @endcomponent
    @endforeach
@endif
