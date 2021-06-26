@extends('frontend.layout')

@section('extra-css')

@endsection

@section('content')

    <div class="container pb-5 mb-2 mb-md-4">
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
                        <h2 class="h4 mb-1">Sign Up</h2>
                        <div class="py-3">
                            <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">With social account:</h3>
                            <div class="d-inline-block align-middle">
                                <a class="btn-social bs-google me-2 mb-2" href="#" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Sign in with Google" aria-label="Sign in with Google">
                                    <i class="ci-google"></i>
                                </a>
                                <a class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Sign in with Facebook" aria-label="Sign in with Facebook">
                                    <i class="ci-facebook"></i>
                                </a>
                                <a class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Sign in with Twitter" aria-label="Sign in with Twitter">
                                    <i class="ci-twitter"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <h3 class="fs-base pt-4 pb-2">Or using form below</h3>
                        <form method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                <input class="form-control rounded-start" name="name" type="text" placeholder="Name"
                                    required="">
                            </div>
                            <div class="input-group mb-3">
                                <i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                <input class="form-control rounded-start" name="email" type="email" placeholder="Email"
                                    required="">
                            </div>
                            <div class="input-group mb-3">
                                <i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                <div class="password-toggle w-100">
                                    <input class="form-control" type="password" name="password" placeholder="Password"
                                        required="">
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox">
                                        <span class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                <div class="password-toggle w-100">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password"
                                        required="">
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox">
                                        <span class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="d-flex flex-wrap justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked="" id="remember_me">
                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                </div>
                                <a class="nav-link-inline fs-sm" href="account-password-recovery.html">
                                    Forgot password?
                                </a>
                            </div> --}}
                            <hr class="mt-4">
                            <div class="text-end pt-4">
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                                    <i class="ci-sign-in me-2 ms-n21"></i>
                                    Sign In
                                </a>
                                <button class="btn btn-primary" type="submit">
                                    <i class="ci-add me-2 ms-n21"></i>
                                    Sign Up
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
