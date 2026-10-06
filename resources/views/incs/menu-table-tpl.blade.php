<tr wire:key="{{ $item['id'] }}" class="align-middle">
    <td class="text-muted fw-bold fs-7" style="width: 70px;">
        #{{ $item['id'] }}
    </td>
    <td>
        <div class="d-flex align-items-center" style="padding-left: {{ strlen($tab) * 12 }}px;">
            @if (strlen($tab) > 0)
                <i class="fa-solid fa-angle-right text-muted me-2 fs-8"></i>
            @else
                <i class="fa-solid fa-folder text-warning me-2 fs-7"></i>
            @endif

            <span class="{{ strlen($tab) === 0 ? 'fw-bold text-dark' : 'text-secondary' }}">
                {{ $item['title'] }}
            </span>
        </div>
    </td>
    <td class="text-end" style="width: 160px;">
        <div class="d-inline-flex gap-1">
            <!-- View Category -->
            <a href="{{ route('category', $item['slug']) }}" 
               target="_blank" 
               class="btn btn-sm btn-light-info text-info rounded-circle d-inline-flex align-items-center justify-content-center p-0" 
               style="width: 32px; height: 32px;"
               title="View on site">
                <i class="fa-solid fa-eye fs-7"></i>
            </a>

            <!-- Edit Category -->
            <a href="{{ route('admin.categories.edit', $item['id']) }}" 
               class="btn btn-sm btn-light-warning text-warning rounded-circle d-inline-flex align-items-center justify-content-center p-0" 
               style="width: 32px; height: 32px;"
               title="Edit">
                <i class="fa-solid fa-pen-to-square fs-7"></i>
            </a>

            <!-- Delete Category -->
            <button class="btn btn-sm btn-light-danger text-danger rounded-circle d-inline-flex align-items-center justify-content-center p-0" 
                    style="width: 32px; height: 32px;"
                    wire:click="deleteCategory({{ $item['id'] }})" 
                    wire:confirm="Are you sure you want to delete category '{{ $item['title'] }}'?"
                    wire:loading.attr="disabled"
                    wire:target="deleteCategory({{ $item['id'] }})"
                    title="Delete">
                
                <span wire:loading.remove wire:target="deleteCategory({{ $item['id'] }})">
                    <i class="fa-solid fa-trash-can fs-7"></i>
                </span>

                <span wire:loading wire:target="deleteCategory({{ $item['id'] }})">
                    <span class="spinner-border spinner-border-sm" style="width: 0.8rem; height: 0.8rem;" role="status"></span>
                </span>
            </button>
        </div>
    </td>
</tr>

@if (isset($item['children']))
    {!! \App\Helpers\Category\Category::getHtml($item['children'], "$tab-") !!}
@endif

