<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">


		<div class="container">
		
		      <a class="navbar-brand" href="/"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicous</small></a>
			 <!-- <a href="/cart"><i class="fa fa-shopping-cart"><div class="cart-items">0</div></i> Cart</a>-->
			 <!-- <a href="#" class="btn btn-link"><i class="fa fa-shopping-cart"> My Cart</i></a> -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
              </button>
              
           
              <div class="dropdown">
                <button type="button" class="btn btn-link" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                        </div>
                        

                        <?php $total = 0 ?>
                        @foreach(session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach

                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="/uploads/item/{{$details['image'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info">Price:  ${{ $details['price'] }}</span> <span class="count"><span class="price text-info" >Quantity:  {{ $details['quantity'] }}</span></span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary">View Cart</a>
                        </div>
                    </div>
                </div>
            </div>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			
	          <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="menu" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="services" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="about" class="nav-link">About</a></li>
			  <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>