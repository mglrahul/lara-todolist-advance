@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">


        <div class="panel panel-default">
            <div class="panel-heading">
                Update Task
            </div>
            @if (count($taskData) > 0)



            <?php //exit;  echo $taskData->user_id; echo '<pre>'; print_r($taskData); exit; ?>
            <div class="panel-body">
                @foreach ($taskData as $task)
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                <form action="{{url('/update/'.$task->id)}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-edit"></i>Update Task
                            </button>
                        </div>
                    </div>
                </form>
                @endforeach
                @else
                <div class="text-danger text-center">No record found</div>
                @endif
            </div>



        </div>


    </div>
</div>
@endsection
