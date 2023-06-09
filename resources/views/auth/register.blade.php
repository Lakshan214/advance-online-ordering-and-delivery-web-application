
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

<section class="checkout spad">
    <div class="container">
      
      
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form method="POST" action="{{ route('order.usedetails') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        
                        <div class="checkout__input">
                            <p>Phone<span>*</span></p>
                            <input type="number" name="phone" value="{{$user->phone}}" required autocomplete="phone">
                        </div>
                        <div class="checkout__input">
                            <p>Delivery Address<span>*</span></p>
                            <input type="text" name="address" value="{{$user->address}}" required autocomplete="address">
                         
                        </div>
                        
                        <div class="checkout__input" >
                            <p> Delivery City<span>*</span></p>
                            {{-- <input type="text" name="City" :value="old('City')" required > --}}
                            <select  type="text"  name="City" value= "{{$user->City}}"  >
                                    <option  value="Krunegla">Krunegla</option>
                                    <option value="Anuradhapura">Anuradhapura</option>
                                    <option value="Gmpaha">Gmpaha</option>
                                    <option value="yapanaya">yapanaya</option>
                                    <option value="Nugegoda<">Nugegoda</option>
                            </select>
                         
                        </div>
                        <br><br>
                        <div class="checkout__input">
                            <p> Location Type<span>*</span></p>
                            {{-- <input type="text" name="Ltype" :value="old('Ltype')"  > --}}
                            <select name="Ltype" value= "{{$user->Ltype}}"  >
                                <option   value="House">House</option>
                                <option value="Office">Office</option>
                                <option value="Appatment">Appatment</option>
                            </select>

                        </div>
                        
                        <br><br>

             
                        {{-- <button  class="btn btn-primary btn-lg" type="submit" style="color: black;"> Register</button> --}}
                    </div>
                  
               

                    <div class="col-lg-4 col-md-6">
                 
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <?php $total=0; ?>
                            @if($getCartItems)
                           @foreach ($getCartItems as $item)
                                
                           @if(isset($item['product']))
                            <ul>
                                <li>{{$item['product']['Name']}} x <b>{{$item['quntity']}}</b><span> Rs.{{$item['quntity']*$item['product']['Price']}}</span></li>
                                
                            </ul>
                            <?php $total += $item['quntity']*$item['product']['Price']  ?>
                            @endif
                            @endforeach
                           
                           
                            
                            <div class="checkout__order__subtotal">Subtotal <span>Rs.{{$total}}.00</span></div>
                           
                            <div   class="checkout__order__total">Total <span>Rs.{{$total}}.00</span></div>
 
                            <input type="radio"  name="payment" value="cash_Payment">
                              <label for="html">Cash </label><br>
                              <input type="radio"  name="payment" value="Card_Payment">
                              <label for="css">Card</label><br><br>
                          
                              @else
                                <h3 style="color: red">Oder is empty</h3 >
                              @endif

                            
                            <button type="submit"  onclick="zeroProductCount()" class="site-btn" style="color: rgb(243, 243, 245);background-color:#7fad39;"> CHECKOUT</button>
                            
                        </form>
                             
                           
                        </div>
                       
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





















