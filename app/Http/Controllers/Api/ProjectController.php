<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){

        $results = Project::with('type','technologies')->paginate(9);

        return response()->json([
            'results' => $results
        ]);

    }

    public function show(string $slug)
    {
        $project = Project::where('slug',$slug)->get();
        //dd($projects);
        return response()->json([
            'results' => $project
        ]);
    }
}
