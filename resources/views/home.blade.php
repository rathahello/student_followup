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
            @if (Auth::user()->role == 1)
                <a href="{{route('students.create')}}" class="btn btn-success">Add student</a>
            @endif

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
                    @if ($student->activeFollowup==0)
                        
                <tbody>
                    <tr> 
                        <td>
                            <img class="mx-auto d-block" src="{{asset('image/'.$student->picture)}}" style="width: 100px;, height:100px;">
                        </td>
                        <td>{{$student->firstname}}</td>
                        <td>{{$student->lastname}}</td>
                        <td>{{$student->class}}</td>
                        <td class="text-center">
                            <a href="{{route('students.show', $student->id)}}" class="text-success"><i class="fas fa-eye"></i></a>
                           @if (Auth::user()->role == 1)
                             <a href="{{route('students.edit',$student->id)}}" class="text-primary"> <i class="fas fa-edit"></i></a>
                           @endif
                            @if (Auth::user()->role == 1)
                               <a href="{{route('followup',$student->id)}}"><i class="fas fa-trash text-danger"></i></a>
                            @endif
                        </td>
                    </tr>
                </tbody> 
                @endif
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
                        @if (Auth::user()->role == 1)
                            
                        <th>Action</th>

                        @endif
                    </tr>
                    </thead>  
                       @foreach ($students as $student)
                       @if ($student->activeFollowup==1)
                           
                    <tbody>
                        <tr>
                            <td>
                                <img class="mx-auto d-block" src="{{asset('image/'.$student->picture)}}" style="width: 100px;, height:100px;">
                            </td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->lastname}}</td>
                            <td>{{$student->class}}</td>

                            @if (Auth::user()->role == 1)
                                
                            <td class="text-center">
                                <a href="{{route('outoffollowup',$student->id)}}"><i class="fas fa-trash text-danger"></i></a>
                            </td>

                            @endif
                        </tr>
                    </tbody>   
                    @endif
                       
                    @endforeach    
                 
                </table>                                                                        
            </div>

        </div>
    </div>

    </div>
@endsection