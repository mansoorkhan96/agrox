<div class="product-list">
    @forelse ($products as $product)
    <div class="product-item">
        <div class="col-md-4 pl-0">
            <div class="product-thumb">
                <a href="/shop/{{ $product->slug }}">
                    <img src="{{ '/storage/' . $product->featured_image }}" alt="" />
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="product-info">
                <a href="/shop/{{ $product->slug }}">
                    <h2 class="title">{{ $product->name }}</h2>
                    <span class="price">
                         
                        <ins>RS {{ $product->price }}</ins>
                    </span>
                </a>
                <div class="product-rating">
                    <div class="star-rating">
                        <span style="width:100%"></span>
                    </div>
                    <i>(2 customer reviews)</i>
                </div>
                <div class="product-desc">
                    <p>{{ $product->details }}</p>
                </div>
                <div class="product-action-list">
                    <a class="organik-btn small" href="#"> ADD TO CART </a>
                </div>
            </div>
        </div>
    </div>
    @empty
        <div class="lead text-center">No Products Found</div>
    @endforelse
</div>