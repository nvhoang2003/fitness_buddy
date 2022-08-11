<div class="container">
    <dl class="row">
        <div class="col-sm-7">
            <dd class="col-sm-9">
                <img class="image" src="/images/product/{{ $product->image }}">
            </dd>
        </div>
        <div class="col-sm-5">

            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $product->name }}</dd>

            <dt class="col-sm-3">Product Status</dt>
            <dd class="col-sm-9">{{ $product->product_status }}</dd>
            @php
                $product->price = number_format($product->price, 0, ',', '.');
                $product->price .= ' USD';
            @endphp
            <dt class="col-sm-3">Price</dt>
            <dd class="col-sm-9">{{ $product->price }}</dd>

            <dt class="col-sm-3">Launch Date</dt>
            <dd class="col-sm-9">{{ $product->size }}</dd>

            <dt class="col-sm-3">Color</dt>
            <dd class="col-sm-9">{{ $product->color }}</dd>

            <dt class="col-sm-3">Stock</dt>
            <dd class="col-sm-9">{{ $product->stock }}</dd>

            <dt class="col-sm-3">Material</dt>
            <dd class="col-sm-9">{{ $product->material }}</dd>

            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $product->description }}</dd>

            <dt class="col-sm-3">Brand</dt>
            <dd class="col-sm-9">{{ $brand->name }}</dd>

            <dt class="col-sm-3">Category</dt>
            <dd class="col-sm-9">{{ $category->name }}</dd>
        </div>
    </dl>
</div>

