<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        $samples = Resource::where('category', 'samples')->limit('4')->get();
        $powerpoints = Resource::where('category', 'powerpoints')->limit('4')->get();
        $links = Resource::where('category', 'links')->limit('10')->get();
        return view('resources.index', compact('samples', 'powerpoints', 'links'));
    }

    public function powerpoints()
    {

    }

    public function links()
    {

    }

    public function samples()
    {

    }
    public function bylaws()
    {
        $bylaws = Resource::where('category', 'bylaws')->limit('10')->get();
        $police_act = Resource::where('category', 'policeact')->limit('10')->get();
        $minutes = Resource::where('category', 'minutes')->limit('10')->get();
        $privacy_policy = Resource::where('category', 'policeact')->limit('10')->get();
        $policy_manual = Resource::where('category', 'policymanual')->limit('10')->get();
        $records_retention = Resource::where('category', 'records')->limit('10')->get();
        return view('resources.bylaws-agm-act', compact('bylaws', 'minutes', 'privacy_policy', 'police_act', 'policy_manual', 'records_retention'));
    }

    public function goals()
    {
        $goals = Resource::where('category', 'goals')->limit('10')->get();
        $business_plan = Resource::where('category', 'business_plan')->limit('10')->get();
        return view('resources.goals', compact('goals', 'business_plan'));
    }
}
