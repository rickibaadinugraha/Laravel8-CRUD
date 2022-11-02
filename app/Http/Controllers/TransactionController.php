<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Stock;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => 'SO.?', // format kode
                'length' => 4 // jumlah digit
            ]
        ];
    }
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $project = Project::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $project = Project::paginate(5);
        }

        $projects = Project::with('detail_transactions')->get();
        return view('transactions.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            // 'cost' => 'required'
        ]);

        Project::create($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('transactions.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $projects)
    {
        return view('transactions.edit', compact('projects'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            // 'file_img_produk' => 'required'
        ]);
        $project->update($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Project updated successfully');
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

        return redirect()->route('transactions.index')
            ->with('success', 'Project deleted successfully');
    }
}
