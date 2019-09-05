@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit {{ $label }}}
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
            <form method="post" action="{{ route($route . '.update', $model->id) }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value={{ $model->name }} />
                </div>
                <div class="form-group">
                    <label for="content">Content :</label>
                    <input type="text" class="form-control" name="content" value={{ $model->content }} />
                </div>
                <div class="form-group">
                    <label for="quantity">URL:</label>
                    <input type="text" class="form-control" name="url" value={{ $model->url }} />
                </div>
                <div class="form-group">
                    <label for="startDate">Start Date:</label>
                    <input class="date form-control" type="text" id="datepicker" name="startDate" value={{ $model->startDate }} />
                </div>
                <div class="form-group">
                    <label for="endDate">End Date:</label>
                    <input class="date form-control" type="text" id="datepicker" name="endDate" value={{ $model->endDate }} />
                </div>
                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <input type="text" class="form-control" name="priority" value={{ $model->priority }} />
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
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
