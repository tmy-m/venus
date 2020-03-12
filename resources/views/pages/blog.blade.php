@extends('layouts.main')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area breadcumb-style-two bg-img" style="background-image: url(/frontend/img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Fashion Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">
               
                <!-- Single Blog Area -->

                <!-- Size chart -->
                <div class="col-12 col-lg-6">
                    <div class="single-blog-area mb-50">
                        <img src="/frontend/img/bg-img/blog1.jpg" alt="">
                        <!-- Post Title -->
                        <div class="post-title">
                            <a href="#"><h3>Size chart</h3></a>
                        </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <!-- Post Title -->
                            <div class="hover-post-title">
                                <a href="#">Size chart</a>
                            </div>
                            <p>Bài viêt này nhằm hướng dẫn mọi người lựa chọn size/kích thước sản phẩm khi mua hàng của shop, và các thông tin khác liên quan về form sản phẩm.</p>
                            <a href="#">Continue reading <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End size chart -->
               
                <!-- Single Blog Area -->
                <!-- Black friday -->
                <div class="col-12 col-lg-6">
                    <div class="single-blog-area mb-50">
                        <img src="/frontend/img/bg-img/blog2.jpg" alt="">
                        <!-- Post Title -->
                        <div class="post-title">
                            <a href="#"><h3>Black Friday</h3></a>
                        </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <!-- Post Title -->
                            <div class="hover-post-title">
                                <a href="#">Black Friday</a>
                            </div>
                            <p>Sale up to 70% tất cả sản phẩm từ ngày 29/11/2019 - 1/12/2019.</p>
                            <a href="#">Continue reading <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Ebd black friday -->
               
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->

@endsection