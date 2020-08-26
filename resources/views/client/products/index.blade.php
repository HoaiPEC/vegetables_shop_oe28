@extends('client.layouts.app')

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category nav nav-tabs">
                        <li class="active">
                            <a href="#firsttab" class="active" data-toggle="tab">
                                {{ trans('clients.all') }}
                            </a>
                        </li>
                        @foreach ($categories as $key => $category)
                            <li>
                                <a href="#tab-product-{{ $key += 1 }}" data-toggle="tab">
                                    {{ trans('clients.'.$category->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="firsttab">
                    <div class="container">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-6 col-lg-3 ftco-animate">
                                    <div class="product">
                                        <a href="#" class="img-prod">
                                            @php $image = $product->images->first() @endphp
                                            <img class="img-fluid" src="{{ asset('img/'. $image['image_path']) }}"
                                                 alt="Colorlib Template">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="text py-3 pb-4 px-3 text-center">
                                            <h3><a href="#">{{ $product->name }}</a></h3>
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    <p class="price">
                                                        @if (isset($product->price_discount))
                                                            <span class="mr-2 price-dc">{{ $product->price }} đ</span>
                                                        @endif
                                                        <span class="price-sale">
                                                            {{ $product->price_discount ? $product->price_discount : $product->price }} đ
                                                          </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="bottom-area d-flex px-3">
                                                <div class="m-auto d-flex">
                                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                        <span><i class="ion-ios-menu"></i></span>
                                                    </a>
                                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                        <span><i class="ion-ios-cart"></i></span>
                                                    </a>
                                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                                        <span><i class="ion-ios-heart"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
                @foreach ($categories as $key => $category)
                    <div class="tab-pane" id="tab-product-{{ $key += 1 }}">
                        @php
                            $product_tabs = $category->products->all();
                        @endphp
                        <div class="container">
                            <div class="row">
                                @foreach ($product_tabs as $product)
                                    <div class="col-md-6 col-lg-3 ftco-animate">
                                        <div class="product">
                                            <a href="#" class="img-prod">
                                                @php $image = $product->images->first() @endphp
                                                <img class="img-fluid" src="{{ asset('img/'. $image['image_path']) }}"
                                                     alt="Colorlib Template">
                                                <div class="overlay"></div>
                                            </a>
                                            <div class="text py-3 pb-4 px-3 text-center">
                                                <h3><a href="#">{{ $product->name }}</a></h3>
                                                <div class="d-flex">
                                                    <div class="pricing">
                                                        <p class="price">
                                                            @if (isset($product->price_discount))
                                                                <span class="mr-2 price-dc">{{ $product->price }} đ</span>
                                                            @endif
                                                            <span class="price-sale">
                                                                {{ $product->price_discount ? $product->price_discount : $product->price }} đ
                                                              </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="bottom-area d-flex px-3">
                                                    <div class="m-auto d-flex">
                                                        <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                            <span><i class="ion-ios-menu"></i></span>
                                                        </a>
                                                        <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                            <span><i class="ion-ios-cart"></i></span>
                                                        </a>
                                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                                            <span><i class="ion-ios-heart"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
