<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
  public function index(){

    $n_project = Project::all()->count();

    $last_project = Project::orderby('id', 'desc')->first();

      return view('admin.home', compact('n_project', 'last_project'));
  }
}