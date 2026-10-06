<div class="col-12 col-md-8 col-lg-7 position-relative">
    <div class="search-form position-relative">

        <form wire:submit="search" class="position-relative">
            <div class="input-group rounded-pill overflow-hidden bg-light p-1 border">
                <input type="text" 
                    class="form-control border-0 bg-transparent shadow-none px-3 py-2" 
                    wire:model.live.debounce.500ms="term" 
                    name="s"
                    placeholder="Search products..." 
                    aria-label="Search products..." 
                    aria-describedby="button-search">
                
                @if ($term)
                    <button type="button" 
                        class="btn btn-link text-muted p-0 me-2 border-0 text-decoration-none" 
                        x-on:click="$wire.term=''; $wire.$refresh()"
                        aria-label="Clear search">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                @endif

                <button class="btn btn-accent rounded-circle px-3 py-2 d-flex align-items-center justify-content-center @if (!$term) opacity-50 @endif" 
                    type="submit"
                    id="button-search"
                    aria-label="Submit search"
                    style="width: 38px; height: 38px;">
                    <i class="fa-solid fa-magnifying-glass fs-6"></i>
                </button>
            </div>
        </form>

        @if (count($search_results))
            <div class="search-results-wrapper position-absolute start-0 end-0 mt-2 z-3">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
                    <ul class="list-group list-group-flush mb-0">
                        @foreach ($search_results as $product)
                            <li class="list-group-item list-group-item-action border-0 px-3 py-2">
                                <a wire:navigate 
                                   href="{{ route('product', $product->slug) }}" 
                                   class="d-flex align-items-center justify-content-between text-decoration-none text-dark py-1">
                                    <span class="fw-medium text-truncate me-3" style="max-width: 80%;">
                                        {{ $product->title }}
                                    </span>
                                    <span class="badge bg-soft-blue text-accent fs-6 rounded-pill">
                                        ${{ $product->price }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </div>
</div>