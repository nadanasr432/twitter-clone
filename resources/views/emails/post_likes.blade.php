<x-mail::message>
# your post was liked

{{ $liker->name }} liked one of your posts

<x-mail::button :url="{{ route('posts.show',$post) }}">
   view post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
