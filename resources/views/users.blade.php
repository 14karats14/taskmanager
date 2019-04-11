@extends('layouts.app')
@section('content')

    <table>
    @foreach($users as $user )
        @if(!$user->admin_status)
        <tr>
            <!--имя пользователя-->
            <td class="table-text">
                <a href="{{route("admin.user",['user' => $user])}}">{{ $user->name }}</a>

            </td>

        </tr>
        @endif
    @endforeach
    </table>

@endsection