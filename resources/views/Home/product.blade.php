
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Men's Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
     
    
    <section class="section" id="men">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-12">
                <div class="men-item-carousel">
                  
                    <div class="owl-men-item owl-carousel">
                        @foreach($product as  $product)
                        <div class="item">
                            
                            <div class="thumb">
                                 
                                <div class="hover-content">
                                    
                                    <ul>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-star"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                               
                                <img src="/product/{{$product->image}}" alt="">
                               
                            </div>
                            <div class="down-content">
                                <h4>Face Wash</h4>
                                <span>RS.375.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                        
                        
                        
                    </div>
                </div>
                
            </div>
           
        </div>
    </div>
    
</section>


<!-- ***** Men Area Ends ***** -->

<!-- ***** Women Area Starts ***** -->

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h2>Women's Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    
    <section class="section" id="women">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">

                <div class="women-item-carousel">
                    <div class="owl-women-item owl-carousel">
                        {{-- @foreach($product1 as  $product) --}}
                        <div class="item">
                            
                            <div class="thumb">
                                 
                                <div class="hover-content">
                                    
                                    <ul>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-star"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                               
                                {{-- <img src="/product/{{$product->image}}" alt=""> --}}
                               
                            </div>
                            <div class="down-content">
                                <h4>Face Wash</h4>
                                <span>RS.375.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            
                        </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
           
        </div>
      
    </div>
   
</section>

<!-- ***** Women Area Ends ***** -->

<!-- ***** Kids Area Starts ***** -->

<section class="section" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Kid's Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="kid-item-carousel">
                    <div class="owl-kid-item owl-carousel">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-star"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="Home/assets/images/k4.jpeg" alt="">
                            </div>
                            <div class="down-content">
                                <h4>School Collection</h4>
                                <span>RS>380.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-star"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="Home/assets/images/k1.jpg" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Shaving</h4>
                                <span>RS.412.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-star"></i></a></li>
                                        <li><a href="{{ route('link.singlepage') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="Home/assets/images/k1.jpg" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Shampoo</h4>
                                <span>RS.320.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>