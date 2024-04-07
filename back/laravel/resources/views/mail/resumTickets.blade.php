{{-- @component('mail::message')
# Confirmación de compra de entradas

¡Hola {{ $user->name }}!

Gracias por tu compra de entradas en nuestro sitio web. A continuación, te proporcionamos un resumen de tu compra:

@component('mail::table')
| Película       | Fecha         | Hora   | Cantidad |
|:--------------:|:-------------:|:------:|:-------:|
@foreach ($tickets as $ticket)
| {{ $ticket->movie }} | {{ $ticket->date }} | {{ $ticket->time }} | {{ $ticket->quantity }} |
@endforeach
@endcomponent

Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.

¡Disfruta de la película!

Saludos,
{{ config('app.name') }}
@endcomponent --}}

HOLA