<?php

namespace App\Http\Controllers;

use App\Models\email;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;



class emailAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = email::orderBy('email','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action',function($data){
            return view('email.button')->with('data',$data);
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
      //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email salah',
        ]);
        if($validasi->fails()){
            return response()->json(['errors'=>$validasi->errors()]);
        }
          $data = [
            'name'=>$request->name,
            'email'=>$request->email
        ];
        email::create($data);
        return response()->json(['success'=>"Data Berhasil disimpan"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = email::where('id',$id)->first();
        return response()->json(['result' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        email::where('id',$id)->delete();
    }
}
