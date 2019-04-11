@extends('layouts.app')

<!-- Имя пользователя -->
@section('content')

    <div>{{$user->name}}</div>


    <table>
        @foreach($tasks as $task)
            <tr>
                <!-- Имя задачи -->

                <td class="table-text">
                    @if(!$task->is_active)
                        <div><s>{{ $task->name }}</s></div>
                    @else
                        <div>{{ $task->name }}</div>
                    @endif
                </td>
            @if(auth()->user()->admin_status == 0)
                <!-- Кнопка выполнено , не выполнено -->

                    <td>

                        <form action={{ route('task.check', [$task]) }} method="POST">
                            {{ csrf_field() }}
                            <button type="submit">check</button>


                        </form>

                    </td>

                    <!-- Кнопка Удалить -->
                    <td>
                        <form action={{ route('task.delete', [$task]) }} method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
            <br>
        @endforeach
    </table>
    @if(auth()->user()->admin_status == 0)
        <form action="{{ route('task.store')}}" method="POST">
            {{ csrf_field() }}

            <input type="text" name="name">
            <button type="submit">submit</button>

        </form>
        @else
        <a href="{{route('admin.users')}}"><button>{{trans('button.back')}}</button></a>
    @endif
@endsection

