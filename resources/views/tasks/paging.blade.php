@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">


      <div class="container">
        <table width="60%" cellspacing="0" cellpadding="4" border="0" class="data">
          @foreach($tasks as $task)
          <tr>
            <td> {{ $task->name }} </td>
          </tr>
          @endforeach
        </table>
        <div class="pagination"> {{ $tasks->links() }} </div>
      </div>


    </div>
</div>
@endsection
