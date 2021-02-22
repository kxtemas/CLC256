
@extends('layouts.app')
 <style>
            html, body {
                background-color: #E9967A;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            </style>
@section('content')
 @if(Auth::user()->usertype == 'admin')
        <table class="table table-dark table-hover">
            <thead>
            <tr class="table-bordered border-light">
                <th>ID</th>
                <th>Title</th>
                <th>Company</th>
                <th>Description</th>
                <th>Location</th>
                <th>Type</th>
                <th>Pay Range</th>
                <th>Employment Type</th>
                <th>Contact Phone Number</th>
                <th>Contact Email Address</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $job)
                <tr>
                    <td>{{$job->id}}</td>
                    <td>{{$job->title}}</td>
                    <td>{{$job->company}}</td>
                    <td>{{$job->description}}</td>
                    <td>{{$job->location}}</td>
                    <td>{{$job->type}}</td>
                    <td>{{$job->pay_range}}</td>
                    <td>{{$job->employment}}</td>
                    <td>{{$job->phonenumber}}</td>
                    <td>{{$job->email}}</td>
                    <td align="center">
                        <form action="{{route('admin.job.edit')}}" method="get">
                            @csrf
                            <input type="hidden" value="{{$job->id}}" name="id">
                            <button class="btn btn-info" type="submit">Edit</button>
                        </form>
                    </td>
                    <td align="center">
                        <form action="{{route('admin.job.delete')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$job->id}}" name="id">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
    @else
        <h1 class="h1" align="center">Unauthorized Access</h1>
    @endif
@endsection
