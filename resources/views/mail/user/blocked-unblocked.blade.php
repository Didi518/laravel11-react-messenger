<x-mail::message>
Bonjour {{ $user->name }},

@if ($user->blocked_at)
Votre compte a été suspendu. Vous ne pouvez plus vous connecter.
@else
Votre compte a été activé. Vous pouvez utiliser normalement nos services.
<x-mail::button url="{{ route('login') }}">
Cliquez ici pour vous connecter
</x-mail::button>
 @endif

Merci, <br>
{{ config('app.name') }}
</x-mail::message>
