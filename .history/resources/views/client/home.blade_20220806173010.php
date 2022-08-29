@extends('client.layouts.index')

@section('content')
    <div id="preloder" style="display: none;">
        <div class="loader" style="display: none;"></div>
    </div>

    @include('client.layouts.herohome')

    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    {{-- start category --}}
                    @foreach ($categories as $category)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset($category->image_path) }}">
                                <h5><a href="#">{{ $category->category_name }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                    {{-- end category --}}
                </div>
            </div>
        </div>
    </section>

    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm Nổi Bật</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tất cả</li>
                            @foreach ($categories as $indexCategory => $categoryitem)
                                <li data-filter=".{{ $categoryitem->category_name }}">
                                    {{ $categoryitem->category_name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($categories as $indexCategoryProduct => $valueCategoryProduct)
                    @foreach ($valueCategoryProduct->products->take(8) as $productItemtab)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $valueCategoryProduct->category_name }} fresh-meat">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                    data-setbg="{{ asset($productItemtab->product_vartar_path) }}">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">{{ $productItemtab->name }}</a></h6>
                                    <h5>{{ $productItemtab->discount }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <div class="banner">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i <= 1; $i++)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="{{ asset($slidersExtras[$i]->image_path) }}"
                                alt="{{ $slidersExtras[$i]->image_name }}">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản Phẩm Mới</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($productsRecommend as $keyRecommend => $valueRecommend)
                                    @if ($keyRecommend % 3 == 0 && $keyRecommend != 0)
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($valueRecommend->product_vartar_path) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $valueRecommend->name }}</h6>
                                        <span>{{ number_format($valueRecommend->discount) }} VND</span>
                                    </div>
                                </a>
                            @else
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($valueRecommend->product_vartar_path) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $valueRecommend->name }}</h6>
                                        <span>{{ number_format($valueRecommend->discount) }} VND</span>
                                    </div>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Đánh Giá Cao</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($productsAppreciate as $keyAppreciate => $valueAppreci)
                                    @if ($keyAppreciate % 3 == 0 && $keyAppreciate != 0)
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($valueAppreci->product_vartar_path) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $valueAppreci->name }}</h6>
                                        <span>{{ number_format($valueAppreci->discount) }} VND</span>
                                    </div>
                                </a>
                            @else
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($valueAppreci->product_vartar_path) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $valueAppreci->name }}</h6>
                                        <span>{{ number_format($valueAppreci->discount) }} VND</span>
                                    </div>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Bán Chạy Nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($productsRecommend as $keyRecommend => $valueRecommend)
                                    @if ($keyRecommend % 3 == 0 && $keyRecommend != 0)
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($valueRecommend->product_vartar_path) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $valueRecommend->name }}</h6>
                                        <span>{{ number_format($valueRecommend->discount) }} VND</span>
                                    </div>
                                </a>
                            @else
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($valueRecommend->product_vartar_path) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $valueRecommend->name }}</h6>
                                        <span>{{ number_format($valueRecommend->discount) }} VND</span>
                                    </div>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Trang Tin Tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
