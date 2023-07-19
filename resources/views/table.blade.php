@extends('layout')
@section('title',"Laravel Demo")
@section('content')
<div class="row">
    <div class="col-sm-2"></div> 
    <div class="col-sm-8">
    </br>
    <h3>Data showing</h3>
    <br>
    <table class="table table-bordered" style="text-align: center;">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Project</td>
                    <td>Image</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
            </thead>
            <!--Showing all data by using foreach-->
            <tbody>
                @foreach($Records as $Record)
                <tr>
                    <td>{{$Record->Name}}</td>
                    <td>{{$Record->Description}}</td>
                    <td>{{$Record->Project}}</td>
                    <!-- Getting img from local by searching Image name-->
                    <td><img src="{{ asset('images/') }}/{{$Record->Image}}"  alt="img" width="75" height="75"></td>
                    <!--Changing Record_Date format-->
                    <td>{{ \Carbon\Carbon::parse($Record->Record_Date)->format('Y-m-d')}}</td>
                    <!--Edit and delete-->
                    <td><a href="{{ route('EditData',['id'=>$Record->id])}}" class="btn btn-warning btn-xs">Update</a>&nbsp;
                    <a href="{{ route('DeleteData',['id'=>$Record->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete this record?')">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection