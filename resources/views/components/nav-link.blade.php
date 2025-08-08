@props(['href', 'active' => false, 'icon' => 'fa-home'])

@php
    $classes = $active ? 'nav-item active' : 'nav-item';
@endphp

<li {{ $attributes->class([$classes]) }}>
    <a class="nav-link" href="{{ $href }}">
        <span class="menu-title">{{ $slot }}</span>
        <i class="mdi {{ $icon }} menu-icon"></i>
    </a>
</li>
