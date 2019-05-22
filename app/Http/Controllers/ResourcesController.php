<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        $samples = Resource::where('category', 'samples')->latest()->limit('4')->get();
        $information = Resource::where('category', 'information')->latest()->limit('4')->get();
        $powerpoints = Resource::where('category', 'powerpoint')->latest()->limit('4')->get();
        $links = Resource::where('category', 'links')->latest()->limit('10')->get();
        return view('resources.index', compact('samples', 'powerpoints', 'links', 'information'));
    }

    public function bylaws()
    {

        $bylaws = Resource::where('category', 'bylaws')->latest()->get();
        $police_act = Resource::where('category', 'policeact')->latest()->get();
        $minutes = Resource::where('category', 'minutes')->latest()->get();
        $privacy_policy = Resource::where('category', 'policeact')->latest()->get();
        $policy_manual = Resource::where('category', 'policymanual')->latest()->get();
        return view('resources.bylaws-agm-act', compact('bylaws', 'minutes', 'privacy_policy', 'police_act', 'policy_manual'));
    }

    public function goals()
    {
        $goals = Resource::where('category', 'goals')->limit('10')->get();
        $business_plan = Resource::where('category', 'business_plan')->limit('10')->get();
        return view('resources.goals', compact('goals', 'business_plan'));
    }

    public function category($category)
    {
        $resources = Resource::where('category', $category)->latest()->get();
        return view('resources.' . $category, compact('resources'));
    }
}
