// resources/views/tasks.blade.php

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
        <!-- 目前任務 -->
        @if (count($tasks) > 0)
                  …
                  <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- 任務名稱 -->
                                <td class="table-text">
                                    <div>{{ $task->name }} </div>
                                </td>
                                <td>
                                    <!-- 代辦：刪除按鈕 -->
                                    <form action="/task/{{ $task->id }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                      <button>刪除任務</button>
                                     </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                   ….
    @endif
@endsection