










<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('Home.links')
</head>

<body>
    <!-- Page Preloder -->
    @include('Home.navbar')
    <!-- Humberger End -->
  
    <!-- Header Section Begin -->
    @include('Home.header')
    <!-- Header Section End -->
    <section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <?php $total=0; ?>
                                @foreach ($cart as $item)
                                    
                               
                                <td class="shoping__cart__item">
                                    <img style="width: 80px; height: 80px;" src="/product/{{$item->image}}" alt="">
                                    <h5>{{$item->Name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    Rs.{{$item->Price}}.00
                                </td>
                                <td class="shoping__cart__quantity">
                                    {{$item->Price}} X {{$item->quntity}}
                                </td>
                                <td class="shoping__cart__total">
                                    {{$item->total}} 
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{Route('cart.deleteCart',$item->id)}}">  <span class="icon_close"></span></a>
    
                                </td>
                                
                            </tr>
                            <?php $total+= $item->total ?>
                            @endforeach 
                        </tbody>
                        
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    {{-- <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a> --}}
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        CONTINUE SHOPPING</a>
                </div>
            </div>
        
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>Rs.{{$total}}.00</span></li>
                        <li>Total <span>Rs.{{$total}}.00</span></li>
                    </ul>
                    <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
    

     

    

    
    


   
    

    <!-- Footer Section Begin -->
    @include('Home.footer')
    <!-- Footer Section End -->
    
    <!-- Js Plugins -->

    @include('Home.js')



    <!--End of Tawk.to Script-->

</body>

</html>























































