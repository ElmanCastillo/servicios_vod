@extends('layouts.template')

@section('content')



			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
						@auth
							<p>Estado del Pago!</p>
							
							<div class="form-group text-center">
							@if (\Session::has('success'))
                              <div class="alert alert-success">
                                 <p>Gracias! El pago a través de PayPal se ha ralizado correctamente.</p>
                              </div>
                             @endif
							 @if (\Session::has('success2'))
                              <div class="alert alert-danger">
							  <p>Lo sentimos! El pago a través de PayPal no se pudo realizar.</p>
                              </div>
                             @endif
                            </div>

							</div>
							@endauth
						</div>

						</div>
					</div>
					<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			</div>
			<!-- /container -->


@endsection
