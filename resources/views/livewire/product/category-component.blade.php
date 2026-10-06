<div>

    @section('metatags')
        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Page Title') }}</title>
        <meta name="description" content="{{ $desc ?? 'default...' }}">
    @endsection

    <!-- Breadcrumbs -->
    <div class="container my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white p-3 rounded-4 shadow-sm mb-0 align-items-center fs-7">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" wire:navigate class="text-decoration-none text-muted">
                        <i class="fa-solid fa-house me-1"></i> Home
                    </a>
                </li>
                @foreach ($breadcrumbs as $breadcrumb_slug => $breadcrumb_title)
                    @if ($loop->last)
                        <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">
                            {{ $breadcrumb_title }}
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{ route('category', $breadcrumb_slug) }}" wire:navigate
                                class="text-decoration-none text-muted">
                                {{ $breadcrumb_title }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="container position-relative my-4" id="products">

        <!-- Modern Livewire Loading Indicator -->
        <div class="update-loading" wire:loading wire:target.except="add2Cart" 
        style="background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(2px);">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="row g-4">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 col-md-4">
                <div class="sidebar">

                    <!-- Mobile Filter Toggle Button -->
                    <button
                        class="btn btn-white w-100 text-start shadow-sm rounded-3 border d-md-none mb-3 p-3 fw-medium d-flex justify-content-between align-items-center"
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false"
                        aria-controls="collapseFilters">
                        <span><i class="fa-solid fa-sliders text-accent me-2"></i> Filters</span>
                        <i class="fa-solid fa-chevron-down fs-7"></i>
                    </button>

                    <div class="collapse d-md-block" id="collapseFilters">
                        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                            <h5
                                class="fw-bold text-dark mb-4 pb-2 border-bottom d-flex align-items-center justify-content-between">
                                <span><i class="fa-solid fa-sliders text-accent me-2 fs-6"></i> Filters</span>
                            </h5>

                            <!-- Active Filters Chips -->
                            @if ($selected_filters)
                                <div class="selected-filters mb-4 p-3 bg-soft-blue rounded-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fw-semibold text-dark fs-7">Selected:</span>
                                        <button class="btn btn-link text-danger p-0 border-0 fs-7 text-decoration-none"
                                            wire:click="clearFilters">
                                            Reset all
                                        </button>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($filter_groups as $filter_group)
                                            @foreach ($filter_group as $filter)
                                                @if (in_array($filter->filter_id, $selected_filters))
                                                    <span
                                                        class="badge bg-white text-dark border shadow-sm rounded-pill d-flex align-items-center gap-2 px-3 py-2 fs-7 fw-normal"
                                                        style="cursor: pointer;"
                                                        wire:click="removeFilter({{ $filter->filter_id }})"
                                                        wire:key="{{ $filter->filter_id }}">
                                                        {{ $filter->filter_title }}
                                                        <i class="fa-solid fa-xmark text-muted"></i>
                                                    </span>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Price Filter -->
                            <div class="filter-price mb-4 pb-3 border-bottom">
                                <label class="form-label fw-bold text-dark fs-7 mb-2">Price ($)</label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="number"
                                        class="form-control rounded-3 border-light bg-light text-center fs-7 shadow-none"
                                        wire:model.live.debounce.500ms="min_price" value="{{ $min_price }}"
                                        placeholder="Від">
                                    <span class="text-muted">-</span>
                                    <input type="number"
                                        class="form-control rounded-3 border-light bg-light text-center fs-7 shadow-none"
                                        wire:model.live.debounce.500ms="max_price" value="{{ $max_price }}"
                                        placeholder="До">
                                </div>
                            </div>

                            <!-- Dynamic Filter Groups -->
                            @foreach ($filter_groups as $k => $filter_group)
                                <div class="filter-block mb-4" wire:key="{{ $k }}">
                                    <h6 class="fw-bold text-dark fs-7 mb-3">{{ $filter_group[0]->title }}</h6>

                                    <div class="d-flex flex-column gap-2">
                                        @foreach ($filter_group as $filter)
                                            <div class="form-check" wire:key="{{ $filter->filter_id }}">
                                                <input wire:model.live="selected_filters" class="form-check-input"
                                                    type="checkbox" value="{{ $filter->filter_id }}"
                                                    id="filter-{{ $filter->filter_id }}">
                                                <label class="form-check-label fs-7 text-secondary"
                                                    for="filter-{{ $filter->filter_id }}">
                                                    {{ $filter->filter_title }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>

            <!-- Products List Area -->
            <div class="col-lg-9 col-md-8">
                <!-- Page Title -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h1 class="fw-bold text-dark h3 mb-0">{{ $category->title }}</h1>
                </div>

                @if (count($products))
                    <!-- Controls Bar (Sort & Limit) -->
                    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white">
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <label class="text-muted fs-7 text-nowrap mb-0 fw-medium">Sort:</label>
                                    <select class="form-select border-0 bg-light rounded-3 fs-7 shadow-none"
                                        aria-label="Sort by:" wire:change="changeSort" wire:model="sort">
                                        @foreach ($sortList as $k => $item)
                                            <option value="{{ $k }}"
                                                @if ($k == $sort) selected @endif
                                                wire:key="{{ $k }}">{{ $item['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2 justify-content-sm-end">
                                    <label class="text-muted fs-7 text-nowrap mb-0 fw-medium">Show:</label>
                                    <select
                                        class="form-select border-0 bg-light rounded-3 fs-7 shadow-none style-select-narrow"
                                        style="max-width: 100px;" aria-label="Show:" wire:change="changeLimit"
                                        wire:model="limit">
                                        @foreach ($limitList as $k => $item)
                                            <option @if ($k == $limit) selected @endif
                                                wire:key="{{ $k }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="row g-4">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-sm-6" wire:key="{{ $product->id }}">
                                @include('incs.product-card')
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $products->links(data: ['scrollTo' => '#products']) }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white my-4">
                        <div class="bg-soft-blue text-accent mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3"
                            style="width: 72px; height: 72px;">
                            <i class="fa-solid fa-box-open fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">No products found</h5>
                        <p class="text-muted small mb-3">Try changing the filter settings or selecting a different category.</p>
                        @if ($selected_filters)
                            <div>
                                <button class="btn btn-accent rounded-pill px-4 py-2 fs-7" wire:click="clearFilters">
                                    Reset filters
                                </button>
                            </div>
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('page-updated', data => {
            document.title = data.title;
        });
    </script>
@endscript
