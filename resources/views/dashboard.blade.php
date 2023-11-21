@foreach ($users as $user)
    <h1>{{ $user['name'] }}</h1>
    <h1>{{ $user['age'] }}</h1>

    @if ($user['age'] < 18)
        <p>User cant Drive</p>
    @endif
@endforeach


@copyright {{date('Y')}}
