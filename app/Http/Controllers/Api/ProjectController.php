<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'technologies'])->paginate(6);

        $this->checkImage($projects);

        $types = Type::all();

        return response()->json(compact('projects', 'types'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['type', 'technologies'])->first();

        //controllo su image
        if ($project->cover_image) {
            $project->cover_image = url("storage/" . $project->cover_image);
        } else {
            $project->cover_image = url("storage/uploads/noimage.jpeg");
        }

        return response()->json($project);
    }

    public function search()
    {
        $string = $_GET['tosearch'];

        $projects = Project::where('name', 'like', "%$string%")->with(['type', 'technologies'])->get();

        $this->checkImage($projects);

        return response()->json(compact('projects'));
    }

    public function typeSearch()
    {
        $typeid = $_GET['type_id'];
        $projects = Project::where('type_id', $typeid)->with(['type', 'technologies'])->get();

        $this->checkImage($projects);

        return response()->json(compact('projects'));
    }

    private function checkImage($projects)
    {
        foreach ($projects as $project) {
            if ($project->cover_image) {
                $project->cover_image = url("storage/" . $project->cover_image);
            } else {
                $project->cover_image = url("storage/uploads/noimage.jpeg");
            }
        }
    }
}
