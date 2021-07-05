@extends('frontend.layout')

@section('extra-css')

@endsection

@section('content')

    <div class="container pb-5 mb-2 mb-md-4 mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <section class="col-lg-6 mx-auto mt-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h2 class="h4 mb-1">Sign in</h2>
                        
                        <br>
                        <hr>
                        
                        <form method="post" action="{{ route('login') }}" class="mt-4">
                            @csrf
                            <div class="input-group mb-3"><i
                                    class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                <input class="form-control rounded-start" name="email" type="email" placeholder="Email"
                                    required="">
                            </div>
                            <div class="input-group mb-3">
                                <i
                                    class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                <div class="password-toggle w-100">
                                    <input class="form-control" type="password" name="password" placeholder="Password"
                                        required="">
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox">
                                        <span class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" name="remember" {{ old('remember') ? 'checked' : ''}} type="checkbox" checked="" id="remember_me">
                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                </div>
                                <a class="nav-link-inline fs-sm" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            </div>
                            <hr class="mt-4">
                            <div class="text-end pt-4">
                                <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                    <i class="ci-add me-2 ms-n21"></i>
                                    Sign Up
                                </a>
                                <button class="btn btn-primary" type="submit">
                                    <i class="ci-sign-in me-2 ms-n21"></i>
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </section>
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3">
                        <a class="btn btn-secondary d-block w-100" href="{{ route('cart') }}">
                            <i class="ci-arrow-left mt-sm-0 me-1"></i>
                            <span class="d-none d-sm-inline">Back to Cart</span>
                            <span class="d-inline d-sm-none">Back</span>
                        </a>
                    </div>
                    <div class="w-50 ps-2">
                        <button class="btn btn-primary d-block w-100" type="submit">
                            <span class="d-none d-sm-inline">Place Order</span>
                            <span class="d-inline d-sm-none">Next</span>
                            <i class="ci-arrow-right mt-sm-0 ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('extra-js')


@endsection
