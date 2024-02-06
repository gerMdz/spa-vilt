<x-mail::message>
# Buen día:
    Nos contactamos con este mensaje, porque alguién se contactó.

"{{ $message }}"

    Este es su dirección de email: {{$email}}
<x-mail::button :url="'mailto:{{$email}}'">
O desde aquí
</x-mail::button>

Gracias, <br>
{{ config('app.name') }}
</x-mail::message>
