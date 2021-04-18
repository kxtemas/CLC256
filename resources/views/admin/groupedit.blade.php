@extends('layouts.app')
@if(Auth::user()->usertype == 'admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="h2 m-auto">{{__('Edit Group')}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('admin.group.update')}}" method="post">
            @csrf
            <!-- HIDDEN ID -->
                <input type="hidden" value="{{$group->id}}" name="id">
                <!--TITLE-->
                <div class="form-group">
                    <label for="titleInput">{{__('title:')}}</label>
                    <input type="text" id="titleInput" placeholder="Name" value="{{$group->title}}"
                          class="form-control @error('name') is-invalid @enderror" name="title" required autocomplete="title" autofocus>
              
                           @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <!--DESCRIPTION-->
                <div class="form-group">

                    <label for="degreeInput">{{__('description:')}}</label><br>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="descriptionInput"  name="description" value="{{ old('description') }}" required autocomplete="description" autofocus rows="5"
                              placeholder="Description">{{$group->description}}</textarea>

                              @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>           
                
               <td align="center">
                          <form action="{{action('GroupController@updateGroup')}}" method="post"> 
                             @csrf                           
                            <button class="btn btn-danger" type="submit">Update</button> 
                      </form> 
                       </td> 
                    
         
         </form>
       
           </div>
           </div>

    @else
        <h1 class="h1" align="center">Unauthorized Access</h1>
    
    @endif
@endsection