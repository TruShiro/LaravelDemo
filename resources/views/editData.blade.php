@extends('layout')
@section('title',"Laravel Demo")
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br>
        <h3>Edit Data</h3>
        <br>
        <!--form action = update the data-->
        <form action="{{route('UpdateData')}}" method="POST" enctype="multipart/form-data">
        @CSRF
        @foreach($Records as $Record)
        <div class="row"> 
           <div class="col-sm-6">
             <label for="Name">Name</label>
             <input type="hidden" name="id" value="{{$Record->id}}">
             <input id="Name" class="form-control input-group-lg border border-dark" type="text" name="Name"  placeholder="Name" value="{{$Record->Name}}" required>
             <div id="uidHelp" class="form-text">*Text input</div>
           </div>      
           <div class="col-sm-6">
             <label for="Description">Description</label>
             <input id="Description" class="form-control input-group-lg border border-dark" type="text" name="Description" placeholder="Description" value="{{$Record->Description}}">
             <div id="uidHelp" class="form-text">*Nullable</div>
           </div>
        </div><!--/form-group-->
        <div class="row">
           <div class="col-sm-12">
             <label for="Project">Project (Current Project: {{$Record->Project}})</label>
             <select class="form-control input-group-lg border border-dark" id="Project" name="Project" required>
             <option disabled>---Current Project---</option>
             <option value="{{$Record->Project}}" id="Project" class="form-control">{{$Record->Project}}</option>
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
             <input id="Record_Date" class="form-control input-group-lg border border-dark" type="date" name="Record_Date" value="{{ \Carbon\Carbon::parse($Record->Record_Date)->format('Y-m-d')}}" required>
             <div id="uidHelp" class="form-text">*Date input</div>
           </div>
        </div><!--/form-group-->
        <div class="row">
           <div class="col-sm-12">
             <label for="Image">Image</label>
             <br>
             <img src="{{ asset('images/') }}/{{$Record->Image}}"  alt="" width="125" height="125">
             <br><br>
             <input id="Image" class="form-control input-group-lg border border-dark" type="file" name="Image">
             <div id="uidHelp" class="form-text">*Image input</div>
           </div>
        </div><!--/form-group-->
        @endforeach
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!--end of form-->
        <br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection