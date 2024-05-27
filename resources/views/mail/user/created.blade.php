<x-mail::message>
Bonjour {{ $user->name }},
Votre compte a bien été créé.

**Voici vos informations de connexion:** <br>
Email: {{ $user->email }} <br>
Mot de passe: {{ $password }}

Merci de vous connecter au système et de changer votre mot de passe.

<x-mail::button url="{{ route('login') }}">
Cliquez ici pour vous connecter
</x-mail::button>

Merci <br>
{{ config('app.name') }}
</x-mail::message>
