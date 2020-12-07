@component('mail::message')
# New website inquiry notification

Hi there,<br>
We have just received a new inquiry through your website.<br>
Please find below the primary contact information:<br>

**Name**: {{ $name }} <br>
**Email**: {{ $email }} <br>
**Phone**: {{ $phone }} <br>
**Inquiry**: {{ $subject }} <br>

For additional information about this inquiry, please visit your website.

@component('mail::button', ['url' => 'https://google.com'])
    View details
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
