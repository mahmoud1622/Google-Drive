<?php

namespace App\Http\Controllers;

use App\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{
   
    public function index()
    {
        $drives=Drive::all();
        return view('drives.index')->with('drives' ,$drives);
    }

  
    public function create()
    {
        return view('drives.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|min:3",
            "description"=>"required|min:5|max:50",
            "inputfile"=>"file|max:90000|mimes:png,jpg,pdf"
        ]);
        $drive=new Drive();
        $drive->title =$request->title;
        $drive->description=$request->description;
        // image code
        $drive_data = $request->file('inputfile');
        $drive_name = $drive_data->getClientOriginalName();
        $drive_data->move(public_path() . "/upload/" , $drive_name);
        $drive->file=$drive_name;
        $drive->save();
        return redirect('drives')->with('done',"Upload Successfully");

    }

 
    public function show($id)
    {
       $dirve=Drive::find($id);
       return view('drives.show')->with('drive' ,$dirve);
    }

   
    public function edit($id)
    {
        $dirve=Drive::find($id);
        return view('drives.edit')->with('drive' ,$dirve);
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            "title"=>"required|min:3",
            "description"=>"required|min:5|max:50",
            "inputfile"=>"required|max:90000|mimes:png,jpg,pdf"
        ]);
        $dirve=Drive::find($id);
        $drive->title =$request->title;
        $drive->description=$request->description;
        // image code
        $drive_data = $request->file('inputfile');
        $drive_name = $drive_data->getClientOriginalName();
        $drive_data->move(public_path() . "/upload/" , $drive_name);
        $drive->file=$drive_name;
        $drive->save();
        return redirect('drives')->with('done',"Update Successfully");

    }


    public function destroy($id)
    {
        $dirve=Drive::find($id);
        $dirve->delete();
        return redirect('drives')->with('done',"Remove Successfully");

    }
    public function download($id){
        $drive=Drive::where('id',$id)->firstOrFail();
        $drive_path = public_path('upload/' . $drive_file) ;
        return response()->download($drive_path);
    }
}
