@if($button->active)
    @if($button->has_children)
        <li class="nav-menu-item {{ $button->has_parent ? 'dropdown-submenu' : ''}}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{title_case($button->name)}}@if($button->has_children) {{--&#8964;--}}<i class="fa fa-caret-down"></i> @endif</a>
            <ul class="dropdown-menu {{!$button->has_parent ? 'multi-level' : ''}}">
                @foreach($button->children->sortBy('sort_order') as $c)
                    @component('admin.nav-buttons.components.recursive-nav', ['button' => $c])
                    @endcomponent
                @endforeach
            </ul>
        </li>
    @else
        <li class="nav-menu-item"><a href="{{$button->link}}">{{title_case($button->name)}}</a></li>
    @endif
@endif