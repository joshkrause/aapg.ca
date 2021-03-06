@php
    $top = App\NavButton::active()->topLevel()->with(['children' => function ($q) {
        $q->active()->orderBy('sort_order');
    }])->orderBy('sort_order')->get();
@endphp

<div class="h7-nav-bar">
    <div class="logo-box"><a href="javascript:void(0)" class="navbar-brand"><img src="/public/images/logos/nav-logo.png" alt="AAPG" class="brand-logo" /></a></div>
    <button class="btn btn-success btn-circle hidden-md-up op-clo"><i class="ti-menu"></i></button>
    <nav class="h7-nav-box">
        <div class="h7-mini-bar">
            <div class="d-flex justify-content-between">
                <div class="gen-info font-14">
                    <span><i class="fa fa-envelope text-success-gradiant"></i> admin@aapg.ca</span>
                    <span><i class="fa fa-phone-square text-success-gradiant"></i> (587) 892-7874</span>
                </div>
            </div>
        </div>
        <div class="main-nav">
            <ul>
				@foreach($top as $button)
					@if($button->name == "Conferences")
					@php
						$conf = App\ConferenceOption::whereDate('registration_start', '<=', Carbon\Carbon::now())
							->whereDate('registration_end','>=', Carbon\Carbon::now())
							->with('conference')
							->get();
					@endphp
					<li class="nav-item">
						<a href="{{$button->link}}" class="nav-link">{{$button->name}} <i class="fa fa-angle-down m-l-5"></i></a>
						<ul class="animated fadeInUp">
							@if( $conf->count() > "0")
							@foreach($conf as $c)
								<li><a href="/conferences/{{$c->conference->id}}">{{$c->conference->title}}</a></li>
							@endforeach
							@endif
							@if( App\Conference::where('active', '1')->where('affiliate', '0')->whereDate('live', '<=', Carbon\Carbon::now())->whereDate('end', '>=', Carbon\Carbon::now())->get()->count() > "0")
								<li><a href="/conferences/upcoming">Upcoming Conferences</a></li>
							@endif
							@if( App\Conference::where('active', '1')->where('affiliate', '0')->whereDate('live', '<=', Carbon\Carbon::now())->whereDate('end', '<' ,
								Carbon\Carbon::now())->get()->count() > "0")
								<li><a href="/conferences/archive">Past Conferences</a></li>
							@endif
							@foreach($button->children as $child)
							<li><a href="{{$child->link}}">{{$child->name}}</a></li>
							@endforeach
						</ul>
					</li>
                    @elseif($button->children->count() > 0)
                    <li class="nav-item"><a href="{{$button->link}}" class="nav-link">{{$button->name}} <i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="animated fadeInUp">
                            @foreach($button->children as $child)
                            <li><a href="{{$child->link}}">{{$child->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li class="nav-item"><a href="{{$button->link}}" class="nav-link">{{$button->name}}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
</div>
