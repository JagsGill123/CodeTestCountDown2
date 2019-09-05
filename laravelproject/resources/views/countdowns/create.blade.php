@extends('layout')


@section('content')
    <style>
        .upper {
            margin-top: 40px;
        }
    </style>
    <div class="card upper">
        <div class="card-header">
            Add {{ $label  }}
            @if(session()->hasOldInput('name'))
                {{ session()->getOldInput('name') }}
            @endif
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif


            <form method="post" action="{{ route($route . '.store') }}">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"
                           @if(session()->hasOldInput('name')) value={{ session()->getOldInput('name', null) }} @endif />
                </div>
                <div class="form-group">
                    <label for="content">Content :</label>
                    <input type="text" class="form-control" name="content"
                           @if(session()->hasOldInput('content')) value={{ session()->getOldInput('content', null) }} @endif />
                </div>
                <div class="form-group">
                    <label for="quantity">URL:</label>
                    <input type="text" class="form-control" name="url"
                           @if(session()->hasOldInput('url')) value={{ session()->getOldInput('url', null) }} @endif />
                </div>
                <div class="form-group">
                    <label for="startDate">Start Date:</label>
                    <input class="date form-control" type="text" id="datepicker" name="startDate"
                           @if(session()->hasOldInput('startDate')) value={{ session()->getOldInput('startDate', null) }} @endif />
                </div>
                <div class="form-group">
                    <label for="endDate">End Date:</label>
                    <input class="date form-control" type="text" id="datepicker" name="endDate"
                           @if(session()->hasOldInput('endDate')) value={{ session()->getOldInput('endDate', null) }} @endif />
                </div>
                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <input type="text" class="form-control" name="priority"
                           @if(session()->hasOldInput('priority')) value={{ session()->getOldInput('priority', null) }} @endif />
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection

@section('js')
    @parent
    <script type="text/javascript">
        $('.date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    </script>
@append
