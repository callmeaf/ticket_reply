<x-mail::message>
    # {{ __('callmeaf-ticket-reply::admin_v1.mail.replied.title', ['ref_code' => $ref_code]) }}

    {{ __('callmeaf-ticket-reply::admin_v1.mail.replied.body', ['title' => $title, 'receiver_identifier' => $receiver_identifier]) }}

    @component('mail::button', ['url' => $url])
        {{ __('callmeaf-ticket-reply::admin_v1.mail.replied.button') }}
    @endcomponent

    {{__('callmeaf-ticket-reply::admin_v1.mail.replied.footer')}}

    {{ config('app.name') }}
</x-mail::message>
