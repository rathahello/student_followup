@extends('layouts.app')

@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header text-center">
                        <img class="mx-auto d-block" src="{{asset('image/'.$students->picture)}}" style="width: 100px;, height:100px;">
                    </div>

                    <div class="card-body">
                        <h4>{{$students->firstname}} {{$students->lastname}} - {{$students->class}}</h4>
                        <p>Tutor: {{Auth::user()->firstname}}</p>

                        <form action="{{route('addcomment',$students->id)}}" method="POST">
                            @csrf                            
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comment" placeholder="write a comment..."></textarea>
                            </div>
                            
                                <button type="submit" class="btn btn-primary mb-2">Post</button>
                        </form>


                    @foreach ($students->comments as $item)
                        <div class="card">
                            <div class="card-body alert-success">
                                <h5>
                                
                                    @if ($item->user_id == 1)
                                        Admin 
                                    @endif
                                    @if ($item->user_id == 2)
                                        Normal
                                    @endif
                                </h5>
                                {{ $item->comment}}
                            </div>
                        </div>
                        <br>
                        @if (Auth::user() && (Auth::user()->id == $item->user_id)) 
                
                            <a href="{{route('deletecomment',$item->id)}}" class="text-danger"><i class="fas fa-trash"></i></a>
                      
                     {{-- Edit Comment --}}

                             <button type="button" class="btn fas fa-edit text-primary" style='font-size:15px' data-toggle="modal" data-target="#myModal{{$item->id}}"></button>
                          @endif
                        <!-- Modal -->
                        <div class="modal fade" id="myModal{{$item->id}}" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header bg bg-primary">
                                  <h4 class="modal-title" style="margin-left:180px;color:white">Edit Comment</h4>
                              </div>
                              <div class="modal-body">
                                  
                                <form action="{{route('updatecomment',$item->id)}}" method="POST">
                                  @csrf
                                  @method('POST')
                                    <h5 style="color:blue"> Your Comment</h5>
                                    <textarea name="comment" class="form-control">{{$item->comment}}</textarea><br>
                                    <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary float-right" type="submit">Edit</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection