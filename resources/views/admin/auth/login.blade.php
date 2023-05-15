@include('admin/layouts.header')

<body>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                                {{-- <a href="index.html" class="text-success"> --}}
                                    <h1 color=red;>Chiity</h1>
                                    {{-- <span><img src="{{asset('images/logo.png')}}" alt="" height="36"></span> --}}
                                    {{--
                                </a> --}}
                            </div>
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="card-body">

                            <form method="POST" action="{{ route('login.admin') }}">
                                @csrf

                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Email">
                                    @error('email')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" id="password"
                                        placeholder="Password">
                                    @error('password')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group text-center mt-4 pt-2">
                                    <div class="col-sm-12">
                                        <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock mr-1"></i>
                                            Forgot your password?</a>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light"
                                            type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-5">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="page-register.html"
                                    class="text-primary ml-1"><b>Sign Up</b></a></p>
                        </div>
                    </div>

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    @include('admin/layouts.js')
</body>