@if($button->active)

	@if($button->has_parent)
	<li style="margin-left:{{$depth*15}}px;"><a href="{{$button->link}}"> @if($depth == 0)<i class="fa fa-angle-right" aria-hidden="true"></i>@endif @for($i = 0; $i < $depth; $i++)&nbsp;&nbsp; @endfor {{$button->name}}</a></li>
	@endif

	@if($button->has_children)
		@php $depth++; @endphp
		@foreach($button->children->sortBy('sort_order') as $c)
	       	@component('admin.nav-buttons.components.recursive-nav-mobile', ['button' => $c, 'depth' => $depth])
	        @endcomponent
	    @endforeach
	@endif


@endif

{{--                             <h4>{{$nav_button->name}}</h4>
                            <ul>
                                <li><a href="course-details.html">Accounting/Finance</a></li>
                                <li><a href="course-details.html">civil engineering</a></li>
                            </ul> --}}