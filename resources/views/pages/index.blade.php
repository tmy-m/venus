@extends('layouts.main')
@section('content')

    <!-- ##### Slider #### -->
    <section id="slider">
        <div class="carousel-inner">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/frontend/img/slides/{{$slides[7]->image}}" class="d-block w-100" alt="...">
                </div>
                {{-- <div class="carousel-item">
                    <img src="frontend/img/slides/{{$slides[3]->image}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="frontend/img/slides/{{$slides[4]->image}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="frontend/img/slides/{{$slides[6]->image}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="frontend/img/slides/{{$slides[7]->image}}" class="d-block w-100" alt="...">
                </div> --}}
                @foreach ($slides as $item)
                    <div class="carousel-item">
                        <img src="/frontend/img/slides/{{$item->image}}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
                
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>   
      </section>
<!-- #### End slider #### -->
<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
<div class="top_catagory_area section-padding-80 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/frontend/img/bg-img/bg-2.jpg);">
                    <div class="catagory-content">
                        <a href="#">Top</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/frontend/img/bg-img/bg-3.gif);">
                    <div class="catagory-content">
                        <a href="#">Bot</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/frontend/img/bg-img/bg-4.jpg);">
                    <div class="catagory-content">
                        <a href="">Accessories</a>
                    </div>
                </div>
            </div>
             <!-- Single Catagory -->
             <div class="col-12 col-sm-6 col-md-3">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/frontend/img/bg-img/bg-5.jpg);">
                        <div class="catagory-content">
                            <a href="#">Bags</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Best Seller</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    @foreach ($best_seller as $item)
                        <!-- Single Product -->
                    <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="/frontend/img/products/{{$item->image}}" alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{route('product_details', $item->id)}}">
                                    <h6>{{$item->name}}</h6>
                                </a>
                                <p class="product-price">{{$item->price_out}}</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="{{route('add_to_cart',$item->id)}}" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

@endsection