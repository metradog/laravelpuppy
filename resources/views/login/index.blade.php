@extends('layouts.login')
@section('title','Login')
@section('content')
<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Login</h1>
							<p class="lead">
								Desarrollado con Laravel 11 😎
							</p>
                            @if ($errors->any())
                            <div class="alert p-3 alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                            @endif
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="{{asset('img/Puppy.jpg')}}" title="Puppy Guagua" alt="Puppy Guagua"  class="img-fluid rounded-circle" width="150" height="132" />
									</div>
									<form method="post" name="form" id="form">
										<div class="mb-3">
                                        <label class="form-label" for="correo">E-Mail</label>
                                        <input class="form-control form-control-lg" type="text" name="correo" id="correo" placeholder="E-Mail" />
										</div>
										<div class="mb-3">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <input class="form-control form-control-lg" type="password" name="password" id="password"  placeholder="Contraseña" />
											
										</div>
										
										<div class="text-center mt-3">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-lg btn-primary" title="Entrar" id="boton"><i class="fas fa-lock-open"></i> Entrar</button> 
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
@endsection