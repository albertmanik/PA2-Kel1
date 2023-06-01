<div class="mini-cart-item clearfix">
    @php
        $userId = Auth::id();
        $cart = session()->get('cart.' . $userId, []);
        $total = 0;
    @endphp
    @foreach ($cart as $productId => $item)
    <div class="mini-cart-img">
        <a href="#"><img src="{{ asset('papanbunga/' . $item['gambar']) }}')" alt="Image"></a>
        <span class="mini-cart-item-delete"><i class="icon-trash"></i></span>
    </div>
    <div class="mini-cart-info">
        <h6><a href="#">{{$item['name']}}</a></h6>
        <span class="mini-cart-quantity">Rp. {{ number_format( $item['price']*$item['quantity'], 2, ',', '.')}}</span>
    </div>
    @endforeach
</div>
