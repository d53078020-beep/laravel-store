<li class="{{ isset($item['children']) ? 'nav-item dropend position-relative' : '' }}">
    @if (isset($item['children']))
        <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between py-2 px-3 fw-medium text-dark style-dropdown-item" 
           href="#" 
           data-bs-toggle="dropdown"
           data-bs-auto-close="outside"
           role="button"
           aria-expanded="false">
            <span>{{ $item['title'] }}</span>
        </a>
        <ul class="dropdown-menu shadow rounded-4 border-0 py-2 my-0" data-bs-popper="static">
            {!! \App\Helpers\Category\Category::getHtml($item['children']) !!}
        </ul>
    @else
        <a class="dropdown-item py-2 px-3 fw-medium text-dark style-dropdown-item" 
           wire:current="active" 
           wire:navigate
           href="{{ url('/category/' . $item['slug']) }}">
            {{ $item['title'] }}
        </a>
    @endif
</li>