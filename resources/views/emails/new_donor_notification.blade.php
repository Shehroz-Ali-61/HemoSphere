@component('mail::message')
# New Blood Donor Alert

A new donor has just joined our network.

**Full Name:** {{ $donor->fullName }}   
**Age:** {{ $donor->age }}  
**Blood Type:** {{ $donor->bloodType }}  
**City:** {{ $donor->city }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
View Donor List
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
