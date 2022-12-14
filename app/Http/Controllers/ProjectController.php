<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::where([
            ['kode_produk', '!=', Null],
            [function ($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('kode_produk', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])  ->orderBy("id", "desc")
            ->paginate(10);

        // $projects = Project::with('stocks')->get();
        // dd($projects);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $project = Project::all();
        $stocks = Stock::all();
        return view('projects.create', compact('project', 'stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->only([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'stock_aktual' => 'required',
        ]);

        Project::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
        ]);
        Stock::create([
            'kode_produk' => $request->kode_produk,
            'stock_aktual'  => $request->stock_aktual,
        ]);
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stocks = Stock::all();
        $project = Project::find($id);
        return view('projects.edit', compact('stocks', 'project'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_produk' => 'required',
            'harga_produk' => 'required',
            'stock_aktual' => 'required'
        ]);
        $project = Project::find($id);
        $project->stocks->stock_aktual = $request->stock_aktual;
        $project->stocks->save();
        $project->update($request->all());
        // dd($project);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
