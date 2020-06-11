@component('mail::message')
# Introduction

Welcome to my task manager Toodle!

@component('mail::button', ['url' => '/'])
Go to Toodle
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
