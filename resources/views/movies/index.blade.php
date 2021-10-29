@extends('layouts.app')
@section('content')
<!-- Products tab & slick -->
<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
                                    @foreach ($data as $key => $movie)
                                        <!-- product -->
										<div class="product">
                                        <a href="{{ route('movies.show',$movie->id) }}">
											<div class="product-img">
												<img src="{{ $movie->thumb }}" alt="{{ $movie->descripcion }}">
												
                                                <div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
                                            </a>
											<div class="product-body">
												<p class="product-category">{{ $movie->genero->genero }}</p>
												<h3 class="product-name"><a href="#">{{ $movie->nombre }}</a></h3>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i> <a href="{{ route('movies.show',$movie->id) }}"><span class="tooltipp">Ver ahora</span></a></button>
												</div>
											</div>
										</div>
										<!-- /product -->
                                        @endforeach

                                        {{ $data->appends($_GET)->links() }}
                                    </div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>                                   
<div class="container">
    
</div>
@endsection