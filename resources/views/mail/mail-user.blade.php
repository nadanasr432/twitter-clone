<x-mail::message>
# Introduction

{{ $user->name }}has liked your tweet

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
