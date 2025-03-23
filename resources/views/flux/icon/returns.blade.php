@php $attributes = $unescapedForwardedAttributes ?? $attributes; @endphp

@props([
    'variant' => 'outline',
])

@php
$classes = Flux::classes('shrink-0')
    ->add(match($variant) {
        'outline' => '[:where(&)]:size-6',
        'solid' => '[:where(&)]:size-6',
        'mini' => '[:where(&)]:size-5',
        'micro' => '[:where(&)]:size-4',
    });
@endphp

<svg {{ $attributes->class($classes) }} data-flux-icon aria-hidden="true" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M25.6676 17.5C25.6676 22.015 22.016 25.6667 17.501 25.6667L18.726 23.625" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M2.33398 10.5C2.33398 5.98501 5.98565 2.33334 10.5007 2.33334L9.27565 4.37501" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M15.9834 5.19168L20.6267 7.875L25.2234 5.20336" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M20.627 12.6234V7.86334" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M19.5302 2.57834L16.7302 4.12996C16.1002 4.47996 15.5752 5.36662 15.5752 6.08995V9.05333C15.5752 9.77666 16.0885 10.6633 16.7302 11.0133L19.5302 12.565C20.1252 12.9033 21.1052 12.9033 21.7119 12.565L24.5118 11.0133C25.1418 10.6633 25.6669 9.77666 25.6669 9.05333V6.08995C25.6669 5.36662 25.1535 4.47996 24.5118 4.12996L21.7119 2.57834C21.1169 2.25168 20.1369 2.25168 19.5302 2.57834Z" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M2.74219 18.025L7.37386 20.7083L11.9822 18.0367" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M7.37305 25.4566V20.6966" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M6.28898 15.4117L3.48899 16.9633C2.85899 17.3133 2.33398 18.1999 2.33398 18.9233V21.8866C2.33398 22.61 2.84732 23.4966 3.48899 23.8466L6.28898 25.3983C6.88398 25.7367 7.86398 25.7367 8.47064 25.3983L11.2707 23.8466C11.9007 23.4966 12.4256 22.61 12.4256 21.8866V18.9233C12.4256 18.1999 11.9123 17.3133 11.2707 16.9633L8.47064 15.4117C7.86398 15.085 6.88398 15.085 6.28898 15.4117Z" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
