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
<<<<<<< Updated upstream
                <li class="nav-item"><a href="/" class="nav-link">About Us <i class="fa fa-angle-down m-l-5"></i></a>
                    <ul class="animated fadeInUp">
                        <li><a href="/board">Board Members</a></li>
                        <li><a href="/resources/bylaws">Bylaws / Minutes / Police Act</a></li>
                        <li><a href="/resources/goals">Strategic Goals / Business Plan</a></li>
                        <li><a href="/members">Our Membership</a></li>
                        <li class="nav-item"><a href="/portal" class="nav-link">Board Portal</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="javascript:void(0)" class="nav-link">Communications <i class="fa fa-angle-down m-l-5"></i></a>
                    <ul class="animated fadeInUp">
                        <li><a href="/communications/topics">Hot Topics</a></li>
                        <li><a href="/communications/newsletters">Newsletters</a></li>
                        <li><a href="/communications/questions">Ask The Members</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="/resources" class="nav-link">Resources</li>
                <li class="nav-item"><a href="/conferences" class="nav-link">Conferences <i class="fa fa-angle-down m-l-5"></i></a>
                <ul class="animated fadeInUp">
                        <li><a href="/conferences">Past Conferences</a></li>
                        <li><a href="/conferences/affiliate">Affiliate Conferences</a></li>
                        <li><a href="/conferences/archive">Past AGM Resolutions & Minutes</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="/members/apply" class="nav-link">Join AAPG</a></li>
                <li class="nav-item"><a href="/alert" class="nav-link">Alert CAC</a></li>
=======
                @foreach($top as $button)
                    @if($button->children->count() > 0)
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
>>>>>>> Stashed changes
            </ul>
        </div>
    </nav>
</div>
