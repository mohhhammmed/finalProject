<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\RequestValid;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files=File::all();
        return view('files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestValid $request)
    {
        $file=$request->file('mainFile');
        $file_name=$file->getClientOriginalName();
        $file->move(public_path() . "/uploades/",$file_name);
        File::create([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'mainFile'=>$file_name,
        ]);

        return redirect(route('file_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $file=File::find($id);
        return view('files.show',compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file=File::where('id',$id)->firstOrfail();
        return view('files.edit',compact('file'));
    }


    public function download($id)
    {
        $file=File::where('id',$id)->firstOrfail();
        $file_path=public_path('uploades/'.$file->mainFile);
        return response()->download($file_path);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(RequestValid $request,$id)
    {

        try{
            if(isset($request) && !empty($request)){
                $mainFile=File::where('id',$id)->firstOrfail();
                if($request->has('mainFile')){
                    unlink('uploades/'.$mainFile->mainFile);
                    $file=$request->file('mainFile');
                    $file_name=$file->getClientOriginalName();
                    $file->move(public_path() . "/uploades/",$file_name);
                }else{
                    $file_name=$mainFile->mainFile;
                }
                $mainFile->update([
                    'title'=>$request->title,
                    'desc'=>$request->desc,
                    'mainFile'=>$file_name,
                ]);
                return redirect(route('file_index'))->with('success','Updated Done');
            }
        }catch(\Exception $ex){
            return redirect(route('file_index'))->with('error','Updated False');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainFile=File::where('id',$id)->firstOrfail();
        if(isset($mainFile) && $mainFile != null){
           // unlink('uploades/'.$mainFile->mainFile);
            $mainFile->delete();
            return redirect(route('file_index'))->with('success','Deleted Done');
        }
    }
}
