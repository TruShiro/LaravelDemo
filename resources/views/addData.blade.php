@extends('layout')
@section('title',"Laravel Demo")
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br>
        <h3>Add Data</h3>
        <br>
        <!-- form action = store data into database -->
        <form action="{{route('AddData')}}" method="POST" enctype="multipart/form-data">
        @CSRF
        <div class="row"> 
           <div class="col-sm-6">
             <label for="Name">Name</label>
             <input id="Name" class="form-control input-group-lg border border-dark" type="text" name="Name"  placeholder="Name" required>
             <div id="uidHelp" class="form-text">*Text input</div>
           </div>      
           <div class="col-sm-6">
             <label for="Description">Description</label>
             <input id="Description" class="form-control input-group-lg border border-dark" type="text" name="Description" placeholder="Description">
             <div id="uidHelp" class="form-text">*Nullable</div>
           </div>
        </div><!--/form-group-->   
        <div class="row">
           <div class="col-sm-12">
             <label for="Group">Group</label>
             <input id="Group" class="form-control input-group-lg border border-dark" type="text" name="Group" placeholder="Group">
             <div id="uidHelp" class="form-text">*Test for php artisan make:migration add_group_to_records_table</div>
           </div>
        </div><!--/form-group-->
        <div class="row">
           <div class="col-sm-12">
             <label for="Project">Project</label>
             <select class="form-control input-group-lg border border-dark" id="Project" name="Project" required>
             <option disabled>---Select the project---</option>
             <option value="No Project" id="Project" class="form-control">No Project</option>
             @foreach($Projects as $Project)
             <option value="{{$Project->projcode}}" id="Project" class="form-control">{{$Project->projcode}}</option>
             @endforeach
            </select>
            <div id="uidHelp" class="form-text">*Selection Input</div>
           </div>
        </div><!--/form-group-->
        <div class="row">
           <div class="col-sm-12">
             <label for="Record_Date">Date</label>
             <input id="Record_Date" class="form-control input-group-lg border border-dark" type="date" name="Record_Date" required>
             <div id="uidHelp" class="form-text">*Date input</div>
           </div>
        </div><!--/form-group-->
        <div class="row">
           <div class="col-sm-12">
             <label for="Image">Image</label>
             <input id="Image" class="form-control input-group-lg border border-dark" type="file" name="Image">
             <div id="uidHelp" class="form-text">*Image input</div>
           </div>
        </div><!--/form-group-->
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!--end of form-->
        <br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection