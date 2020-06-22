@extends('layouts.app')

@section('content')
<div class="container">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#first">Follow Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#second">Out of Followup</a>
        </li>
    </ul>
                
    <div class="tab-content">

        <div class="container tab-pane container active mt-3" id="first">
            <a href="{{route('students.create')}}">Add student</a>

        <br><br>
        <form class="searches mb-3" action="#">
            <input type="text" class="form-control" placeholder="Search.." name="search">
        </form>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Picture</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach ($students as $student)
                    
                <tbody>
                    <tr> 
                        <td>
                            <img class="mx-auto d-block" src="{{asset('image/'.$student->picture)}}" style="width: 100px;, height:100px;">
                        </td>
                        <td>{{$student->firstname}}</td>
                        <td>{{$student->lastname}}</td>
                        <td>{{$student->class}}</td>
                        <td>
                            <a href="#" class="text-success"><i class="fas fa-eye"></i></a>
                           
                            <a href="{{route('students.edit',$student->id)}}" class="text-primary"> <i class="fas fa-edit"></i></a>
                            
                        </td>
                    </tr>
                </tbody> 
                    
                @endforeach
            </table>                                                                         
        </div>


        <div class="tab-pane container fade mt-3" id="second">
                
            <form class="searches mb-3" action="#">
                <input type="text" class="form-control" placeholder="Search.." name="search">
            </form>
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th>Picture</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                    </thead>  
                    <tbody>
                        <tr>
                           <td>#</td>
                           <td>#</td>
                           <td>#</td>
                           <td>#</td>
                            <td>
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                    </tbody>       
                 
                </table>                                                                        
            </div>

        </div>
    </div>

    </div>
@endsection