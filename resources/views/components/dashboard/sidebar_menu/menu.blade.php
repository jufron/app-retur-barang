{{--
  * How to use this component:
  <x-dashboard.sidebar_menu.menu
    label="Menu Label"
    href="/menu/path"
    :activeMenu="true/false"
  />
--}}

@props([
  'label',
  'href',
  'activeMenu' => false
])

<li class="sidebar-item @if (request()->is($activeMenu)) active @endif">
  <a href="{{ $href }}" class='sidebar-link'>
    @isset($icon)
      {{ $icon }}
    @else
    <i class="bi bi-grid-fill"></i>
    @endisset
    <span>{{ $label }}</span>
  </a>
</li>
