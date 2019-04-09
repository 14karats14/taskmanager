<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/sass/app.css') }}" />
<html lang="en">
<head>
    <title>Task manager</title>

</head>
<body>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- Имя пользователя -->

        <td class="table-text">
            <div>{{auth()->user()->name}}</div>
        </td>

<table>
    @foreach($tasks as $task)
        <tr>
            <!-- Имя задачи -->
            <td class="table-text">
                <div>{{ $task->name }}</div>
            </td>
            <td class="table-text">
                <div>{{ $task->is_active }}</div>
            </td>
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
</tr>
<br>
@endforeach
</table>
<form action={{ route('task.store')}}method="POST">
    {{ csrf_field() }}

    <input type="text" name="name">
    <button type="submit">submit</button>

</form>
@yield('content')
</body>
