<div class="col-lg-3 order-2 order-lg-1">
    <h5 class="text-uppercase mb-4">Categories</h5>
    <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">Fashion &amp; Acc</strong></div>
    <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
        @foreach($product as $p)
            <li class="mb-2"><a class="reset-anchor" href="{{route('viewC1.viewproduct', ['id' => $c->CollectionID,'offset'=>0])}}">{{$c->name}}</a></li>
        @endforeach
    </ul>
    <h5 class="text-uppercase mb-4">Stylist</h5>
    <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
        @foreach($style as $s)
            <li class="mb-2"><a class="reset-anchor" href="{{route('viewC1.viewstyle', ['id' => $s->style_id,'offset'=>0])}}">{{$s->style_name}}</a></li>
        @endforeach
    </ul>
    <h6 class="text-uppercase mb-3">Show only</h6>
    <div class="form-check mb-1">
        <input class="form-check-input" type="checkbox" id="checkbox_1">
        <label class="form-check-label" for="checkbox_1">Returns Accepted</label>
    </div>
    <div class="form-check mb-1">
        <input class="form-check-input" type="checkbox" id="checkbox_2">
        <label class="form-check-label" for="checkbox_2">Returns Accepted</label>
    </div>
    <div class="form-check mb-1">
        <input class="form-check-input" type="checkbox" id="checkbox_3">
        <label class="form-check-label" for="checkbox_3">Completed Items</label>
    </div>
    <div class="form-check mb-1">
        <input class="form-check-input" type="checkbox" id="checkbox_4">
        <label class="form-check-label" for="checkbox_4">Sold Items</label>
    </div>
    <div class="form-check mb-1">
        <input class="form-check-input" type="checkbox" id="checkbox_5">
        <label class="form-check-label" for="checkbox_5">Deals &amp; Savings</label>
    </div>
    <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" id="checkbox_6">
        <label class="form-check-label" for="checkbox_6">Authorized Seller</label>
    </div>
    <h6 class="text-uppercase mb-3">Buying format</h6>
    <div class="form-check mb-1">
        <input class="form-check-input" type="radio" name="customRadio" id="radio_1">
        <label class="form-check-label" for="radio_1">All Listings</label>
    </div>
    <div class="form-check mb-1">
        <input class="form-check-input" type="radio" name="customRadio" id="radio_2">
        <label class="form-check-label" for="radio_2">Best Offer</label>
    </div>
    <div class="form-check mb-1">
        <input class="form-check-input" type="radio" name="customRadio" id="radio_3">
        <label class="form-check-label" for="radio_3">Auction</label>
    </div>
    <div class="form-check mb-1">
        <input class="form-check-input" type="radio" name="customRadio" id="radio_4">
        <label class="form-check-label" for="radio_4">Buy It Now</label>
    </div>
</div>
