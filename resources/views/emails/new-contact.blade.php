@component('mail::message')
# {{ $request->last_name }} {{ $request->first_name }}

Tel: [{{ $request->phone }}](tel:{{ $request->phone }} "Suna")<br>
Email: [{{ $request->email }}](mailto:{{ $request->email }} "Trimite Mail")<br><br>
{!! $request->message !!}

@endcomponent
