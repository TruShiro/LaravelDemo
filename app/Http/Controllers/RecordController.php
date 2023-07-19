<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
//Access to DB(HeidiSql) data
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        //Getting Project's Data from Heidisql
        $Projects = DB::Table('project')->get();
        //Return to home page with $Projects for @foreach
        return view('addData',compact('Projects'));
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
        //Users input
        $Name=$request->input('Name');
        $Description=$request->input('Description');
        $Project=$request->input('Project');
        
        //Date input which changed format
        $Record_Date=$request->input('Record_Date');
        $Date = date("Y-m-d", strtotime($Record_Date));//Change date input from Y/m/d to Y-m-d

        //Image input but imagename save in database
        $Image=$request->file('Image');
        $Image->move('images',$Image->getClientOriginalName()); //Image has been saved to images. images is in public -> images                 
        $ImageName=$Image->getClientOriginalName(); //Database save Image's name

        //Create data and save into database
        $Record = Record::create([
            'Name'=>$Name,
            'Description'=>$Description,
            'Project'=>$Project,
            'Record_Date'=>$Date,
            'Image'=>$ImageName
        ]);

        //Return to Home page
        return redirect()->route('HomePage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {   
        //Get "Record" data from database
        $Records=Record::get();

        return view('table',compact('Records'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Get data from Record where id = $id
        $Records=Record::where('id',$id)->get();
        $Projects= DB::table('project')->get();
        return view('editData',compact('Records','Projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {   
        //it is same as Record::where('id',$id)->first();
        $Record=Record::find($request->id);

        //Image edit
        if($request->file('Image')!=''){//if user upload something
            $image=$request->file('Image');        
            $image->move('images',$image->getClientOriginalName()); //Image has been saved to images. images is in public -> images       
            $imageName=$image->getClientOriginalName(); 
            $Record-> Image = $imageName;
        }

        //Date edit
        $Record_Date=$request->input('Record_Date');
        $Date = date("Y-m-d", strtotime($Record_Date));//Change date input from Y/m/d to Y-m-d
        $Record->Record_Date= $Date;

        //Normal edits 
        $Record->Name=$request->input('Name');
        $Record->Description=$request->input('Description');
        $Record->Project=$request->input('Project');

        //Save the changes made by user
        $Record->save();

        return redirect()->route('ShowData');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        //it is same as Record::where('id',$id)->first();
        $Record=Record::find($id);

        //That $Record will be deleted
        $Record->delete();

        //Return to table
        return redirect()->route('ShowData');
    }
}
