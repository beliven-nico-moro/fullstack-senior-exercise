@props([
    'username'  => 'John',
    'gender'    => 'male',
    'width'     => 42
])

@php
    $api_gender = ($gender === 'male') ? 'boy' : 'girl';
@endphp

<img width="{{ $width }}" src="https://avatar.iran.liara.run/public/{{ $api_gender }}?username={{ $username }}" />
