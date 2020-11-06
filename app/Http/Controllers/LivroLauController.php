<?php

namespace App\Http\Controllers;

use App\Models\LivroLau;
use Illuminate\Http\Request;
use App\Http\Requests\LivrolauRequest;

class LivroLauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search)) {
            $livrolaus = LivroLau::where('autor','LIKE',"%{$request->search}%")
                            ->orWhere('titulo','LIKE',"%{$request->search}%")->paginate(5);
        } else {
            $livrolaus = LivroLau::paginate(5);
        }

        return view('livrosLau.index',[
            'livrolaus' => $livrolaus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('livrosLau.create',[
            'livrolau' => new LivroLau,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivrolauRequest $request)
    {
        $this->authorize('admin');
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $livrolau = LivroLau::create($validated);
        request()->session()->flash('alert-success','Livro Cadastrado com Sucesso!');

        return redirect("/livrolau/{$livrolau->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LivroLau  $livrolau
     * @return \Illuminate\Http\Response
     */
    public function show(LivroLau $livrolau)
    {
        return view('livrosLau.show',[
            'livrolau' => $livrolau
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LivroLau  $livrolau
     * @return \Illuminate\Http\Response
     */
    public function edit(LivroLau $livrolau)
    {
        $this->authorize('admin');
        return view('livrosLau.edit',[
            'livrolau' => $livrolau
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LivroLau  $livrolau
     * @return \Illuminate\Http\Response
     */
    public function update(LivrolauRequest $request, LivroLau $livrolau)
    {
        $this->authorize('admin');
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $livrolau->update($validated);
        request()->session()->flash('alert-info','Livro Atualizado com Sucesso!');
        return redirect("/livrolau/{$livrolau->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LivroLau  $livrolau
     * @return \Illuminate\Http\Response
     */
    public function destroy(LivroLau $livrolau)
    {
        $this->authorize('admin');
        $livrolau->delete();
        return redirect('/livrolau');
    }
}
