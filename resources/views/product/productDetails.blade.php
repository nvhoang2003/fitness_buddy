<div class="container">
    <dl class="row">
        <div class="col-sm-6">
            <dd class="col-sm-9">
                <img class="image" src="/images/product/{{ $product->image }}">
            </dd>
        </div>
        <div class="col-sm-6">

            <dt class="col-sm-5">Name</dt>
            <dd class="col-sm-7 text-uppercase">{{ $product->product_name }}</dd>

            <dt class="col-sm-5">Product Status</dt>
            <dd class="col-sm-7 text-uppercase">{{ $product->product_status }}</dd>
            @php
                $product->price = number_format($product->price, 0, ',', '.');
                $product->price .= ' USD';
                $date = explode('-',$product->launch_date);
                $date = $date[2].'/'.$date[1].'/'.$date[0];
            @endphp
            <dt class="col-sm-5">Price</dt>
            <dd class="col-sm-7">${{ $product->price }}</dd>

            <dt class="col-sm-5">Launch Date</dt>
            <dd class="col-sm-7 ">{{ $date }}</dd>

            <dt class="col-sm-5">Size</dt>
            <dd class="col-sm-7 text-uppercase">{{ $product->size }}</dd>

            <dt class="col-sm-5">Color</dt>
            <dd class="col-sm-7 text-uppercase">{{ $product->color }}</dd>


            <dt class="col-sm-5">Material</dt>
            <dd class="col-sm-7 text-uppercase">{{ $product->material }}</dd>

            <dt class="col-sm-5">Style</dt>
            <dd class="col-sm-7 text-uppercase">{{ $product->style }}</dd>
        </div>
    </dl>
</div>

