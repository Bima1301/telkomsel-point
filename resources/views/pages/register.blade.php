@include('partials.head')

<body class="" style="background-color: #FFF0F0">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Name" id="name" name="name" required>
                                        @error('name')
                                        <p style="color: red;font-size: 14px;margin-top: 5px">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" id="email" type="email"
                                        name="email" placeholder="Enter Email Address..." required>
                                    @error('email')
                                        <p style="color: red;font-size: 14px;margin-top: 5px">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2 text-red" /> --}}
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password" autocomplete="new-password" placeholder="Password" required>
                                            @error('password')
                                        <p style="color: red;font-size: 14px;margin-top: 5px">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password_confirmation" name="password_confirmation"
                                            placeholder="Confirm Password" required>
                                            @error('password_confirmation')
                                        <p style="color: red;font-size: 14px;margin-top: 5px">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    </div>
                                </div>
                                <button type="submit" style="margin-top: 100px"
                                    class="btn btn-danger btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                            </form>

                            <div class="text-center">
                                <a class="small text-danger text-decoration-none" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
