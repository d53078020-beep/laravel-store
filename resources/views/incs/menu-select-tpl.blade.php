<option 
    value="{{ $item['id'] }}"
    wire:key="cat-opt-{{ $item['id'] }}"
    class="{{ $item['parent_id'] == 0 ? 'fw-bold text-dark' : 'text-secondary' }}"
    @if (isset($this->id) && $item['id'] == $this->id) disabled style="background-color: #e9ecef; color: #adb5bd;" @endif
>
    {!! $tab !!}{{ $item['parent_id'] != 0 ? '└─ ' : '' }}{{ $item['title'] }}
    @if (isset($this->id) && $item['id'] == $this->id)
        (current category)
    @endif
</option>

@if (isset($item['children']))
    {!! \App\Helpers\Category\Category::getHtml($item['children'], $tab . '&nbsp;&nbsp;&nbsp;&nbsp;') !!}
@endif