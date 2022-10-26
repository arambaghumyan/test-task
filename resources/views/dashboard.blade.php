@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Имя клиента</th>
                  <th scope="col">Е-майл клиента</th>
                  <th scope="col">тема</th>
                  <th scope="col">описание</th>
                  <th scope="col">вложенный файл</th>
                  <th scope="col">дата создания</th>
                  <th scope="col">время старта задачи</th>
                  <th scope="col">время завершения задачи</th>
                  <th scope="col">Статус</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                    <tr>
                      <th scope="row">{{ $task->id }}</th>
                      <td>{{ $task->user->name }}</td>
                      <td>{{ $task->user->email }}</td>
                      <td>{{ $task->theme }}</td>
                      <td>{{ $task->description }}</td>
                      <td><a target="_blank" href="{{'storage/uploads/'.$task->file}}">{{ $task->file }}</a></td>
                      <td>{{ $task->created_at }}</td>
                      <td>{{ $task->start_time }}</td>
                      <td>{{ $task->end_time }}</td>
                      <td>
                        @if($task->status == 'pending')
                          <a href="{{ route('set.status', ['accepted', $task->id]) }}" class="btn btn-success">Принять</a>
                          <a href="{{ route('set.status', ['declined', $task->id]) }}" class="btn btn-danger">Отклонить</a>
                        @else
                          {{ $task->status() }}
                        @endif
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            {{ $tasks->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection
