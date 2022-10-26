@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
               <div class="alert alert-success">
                   <strong>{{ $message }}</strong>
               </div>
             @endif
             @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <strong>{{ Session::get('fail') }}</strong>
                </div>
             @endif
            <form method="POST" action="{{route('save.task')}}" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">тема</label>
                <input type="text" class="form-control" name="theme" id="exampleFormControlInput1">
                @if($errors->has('theme'))
                    <div class="error">{{ $errors->first('theme') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">описание</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                @if($errors->has('description'))
                    <div class="error">{{ $errors->first('description') }}</div>
                @endif
              </div>
              <div class="form-group mt-2">
                  <label for="exampleFormControlFile1">вложенный файл</label><br>
                  <input type="file" class="form-control-file" accept=".doc,.txt,'.xls" name="file" id="exampleFormControlFile1">
                  @if($errors->has('file'))
                      <div class="error">{{ $errors->first('file') }}</div>
                  @endif
                </div>
               <div class="form-group">
                 <label for="exampleFormControlInput1">время старта задачи</label>
                 <input type="text" class="form-control" name="start_time" id="timepicker">
                 @if($errors->has('start_time'))
                     <div class="error">{{ $errors->first('start_time') }}</div>
                 @endif
               </div>
               <div class="form-group">
                 <label for="exampleFormControlInput1">время завершения задачи</label>
                 <input type="text" class="form-control" name="end_time" id="timepickerEnd">
                 @if($errors->has('end_time'))
                     <div class="error">{{ $errors->first('end_time') }}</div>
                 @endif
               </div>
               <div class="form-group mt-3">
                <button class="btn btn-success" type="submit">Save</button>
               </div>
            </form>
        </div>
        <div class="col-md-12 mt-5">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">тема</th>
                  <th scope="col">описание</th>
                  <th scope="col">вложенный файл</th>
                  <th scope="col">время старта задачи</th>
                  <th scope="col">время завершения задачи</th>
                  <th scope="col">Статус</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                    <tr>
                      <th scope="row">{{ $task->id }}</th>
                      <td>{{ $task->theme }}</td>
                      <td>{{ $task->description }}</td>
                      <td><a target="_blank" href="{{'storage/uploads/'.$task->file}}">{{ $task->file }}</a></td>
                      <td>{{ $task->start_time }}</td>
                      <td>{{ $task->end_time }}</td>
                      <td>{{ $task->status() }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@section('js')
    <script type="text/javascript">
        $(function () {
                $('#timepicker').timepicker({
                    showMeridian: false,
                    showInputs: true
                });
                $('#timepickerEnd').timepicker({
                    showMeridian: false,
                    showInputs: true
                });
            });
    </script>
@endsection
@endsection
