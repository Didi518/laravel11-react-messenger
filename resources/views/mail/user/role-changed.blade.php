<x-mail::message>
Bonjour {{ $user->name }},

@if ($user->is_admin)
Vous êtes maintenant administrateur. Vous pouvez ajouter ou bloquer des utilisateurs.
@else
Vous n'avez plus les droits d'administration. Vous ne pouvez plus ajouter ou bloquer des utilisateurs.
@endif
<br>

Merci, <br>
{{ config('app.name') }}
</x-mail::message>
