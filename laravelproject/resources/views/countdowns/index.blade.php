@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif

        <a href="{{ route('countdowns.create') }}" class="mb-3 btn btn-xs btn-info float-right ">Add CountDown</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Content</td>
                <td>Url</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Priority</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->content}}</td>
                    <td>{{$model->url}}</td>
                    <td>{{$model->startDate}}</td>
                    <td>{{$model->endDate}}</td>
                    <td>{{$model->priority}}</td>
                    <td><a href="{{ route('countdowns.edit',$model->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('countdowns.destroy', $model->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
