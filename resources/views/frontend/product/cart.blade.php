@extends('frontend.master')
@section('title')
    Services
@endsection
@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                <img src="{{asset($banner->image) }}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Books</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Cart Section Start -->
        <div class="rs-cart orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="cart-wrap">
                    <form>
                        <table class="cart-table">
                            <thead>
                            <tr>
                                <th class="product-remove"></th>
                                <th class="product-thumbnail"></th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $sum = 0 @endphp
                            @foreach($cart_products as $products)
                                <tr>
                                    <td class="product-remove"><a
                                            href="{{route('remove-cart-product',['id'=>$products->__raw_id])}}"><i
                                                class="fa fa-close"></i></a></td>
                                    <td class="product-thumbnail"><a href="#"><img src="{{asset($products->image)}}"
                                                                                   alt="image" width="100px"
                                                                                   height="100px"></a></td>
                                    <td class="product-name"><a href="#">{{$products->name??null}}</a></td>
                                    <td class="product-price"><span>$</span>{{$products->price??null}}</td>
                                    <td class="product-quantity"><input type="number" class="input-text qty"
                                                                        id="{{$products->__raw_id}}"
                                                                        value="{{$products->qty??null}}"></td>
                                    <td class="subtotal"><span class="amount" id="total_{{$products->__raw_id}}"><span class="symbol">$</span ><span >{{$products->qty * $products->price}}</span></span>
                                    </td>
                                </tr>
                                @php $sum = $sum + $products->total @endphp
                            @endforeach
                            <tr>
                                {{--                                <td colspan="6" class="action text-right">--}}

                                {{--                                    <div class="update-cart">--}}
                                {{--                                        <button class="btn-shop orange-color">Update cart</button>--}}
                                {{--                                    </div>--}}
                                {{--                                </td>--}}
                            </tr>
                            </tbody>
                        </table>
                    </form>
                    <div class="cart-collaterals pt-70 md-pt-50">
                        <div class="cart-totals">
                            <h5 class="title mb-25">Cart totals</h5>
                            <table class="cart-total-table">
                                <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><span class="amount" id="subtotal"><span>$</span>{{$sum}}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span class="amount" id="total"><span>$</span>{{$sum}}</span></strong></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <button class="btn-shop orange-color"> Proceed to checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Section End -->
        <!-- Content wrapper end -->
        <script>
        $(document).ready(function () {

    // Listen for 'change' event, so this triggers when the user clicks on the checkboxes labels
    $('.qty').on('change', function (e) {
{{--        console.log($(this).attr("id"));--}}
            {{--        console.log($(this).val());--}}
            var id = 'total_'+$(this).attr("id");
            console.log(id)
    $.ajax({
    url:"{{url('/update-cart-product')}}",
    method:"GET",
    data:{
         id : $(this).attr("id"),
         qty: $(this).val()
    },
    dateType: "JSON",
    success: function( data ) {

         document.getElementById("subtotal").innerText = '$'+data.total;
         document.getElementById("total").innerText = '$'+data.total;
         document.getElementById(id).innerText = '$'+data.single_total;
    }
});

});

});




        </script>

    </div>
    <!-- Main content End -->

@endsection
