@component('mail::message')
# Your Post was Liked

{{ $liker->name }} liked one of your posts!

@component('mail::button', ['url' => route('posts.show', $post)])
See Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
