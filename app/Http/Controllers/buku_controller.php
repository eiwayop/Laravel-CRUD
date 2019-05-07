<?php
namespace App\Http\Controllers;
use App\buku_model;
use Illuminate\Http\Request;
class buku_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = buku_model::all()->toArray();
        return view('index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'judul'         =>  'required',
          'pengarang'     =>  'required',
          'kategori'      =>  'required',
          'tahunTerbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = new buku_model([
          'judul'         =>  $request->get('judul'),
          'pengarang'     =>  $request->get('pengarang'),
          'kategori'      =>  $request->get('kategori'),
          'tahunTerbit'   =>  $request->get('tahunTerbit'),
          'penerbit'      =>  $request->get('penerbit')
      ]);
      $data->save();
      return redirect()->route('data.create')->with('success', 'Data Added');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\buku_model  $book
     * @return \Illuminate\Http\Response
     */
    public function show(buku_model $book)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\buku_model  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = buku_model::find($id);
        return view('edit', compact('data', 'id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\buku_model  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'judul'         =>  'required',
          'pengarang'     =>  'required',
          'kategori'      =>  'required',
          'tahunTerbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = buku_model::find($id);
      $data->judul=$request->get('judul');
      $data->pengarang=$request->get('pengarang');
      $data->kategori=$request->get('kategori');
      $data->tahunTerbit=$request->get('tahunTerbit');
      $data->penerbit=$request->get('penerbit');
      $data->save();
      return redirect()->route('data.index')->with('success', 'Data Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\buku_model  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = buku_model::find($id);
      $data->delete();
      return redirect()->route('data.index')->with('success', 'Data Deleted');
    }
}