@component('mail::message')
# Hoje é um dia especial!
 
Parabéns {{ $person['first_name'] }}

Venha celebrar em uma missa com a gente. 
Estaremos rezando por você!

@component('mail::button', ['url' => $url])
Encontre o Emaús mais próximo
@endcomponent
 
Um abraço,<br>
{{ config('app.name') }}
@endcomponent