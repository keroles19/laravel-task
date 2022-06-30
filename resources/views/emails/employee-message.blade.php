@component('mail::message')
    # Hello {{$employee->name}},
    <br>

    <p>Welcome For My {{ config('app.name')}} </p>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
