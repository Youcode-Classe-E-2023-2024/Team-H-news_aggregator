
<body class="form">
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
@endif
<!-- BEGIN LOADER -->

<body class="form">

<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <h2>Flux Rss</h2>
                                <p>Enter your Resource URL</p>
                            </div>
                            <div class="col-12 mb-4">
                                <form action="{{route('addRss.index')}}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control add-billing-address-input" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">URL</label>
                                            <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-check form-check-primary form-check-inline">
                                                <input class="form-check-input me-3" type="checkbox" id="form-check-default" name="agreement">
                                                <label class="form-check-label" for="form-check-default">
                                                    I agree the <a href="#" class="text-primary">Terms and Conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button class="btn btn-secondary w-100">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="">
                                    <div class="seperator">
                                        <hr>
                                        <div class="seperator-text"> <span>Or continue with</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-12">
                                <div class="mb-4">
                                    <button class="btn  btn-social-login w-100 ">
                                        <img src="https://designreset.com/cork/html/src/assets/img/google-gmail.svg" alt="" class="img-fluid">
                                        <span class="btn-text-inner">Google</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-sm-4 col-12">
                                <div class="mb-4">
                                    <button class="btn  btn-social-login w-100">
                                        <img src="https://designreset.com/cork/html/src/assets/img/github-icon.svg" alt="" class="img-fluid">
                                        <span class="btn-text-inner">Github</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-sm-4 col-12">
                                <div class="mb-4">
                                    <button class="btn  btn-social-login w-100">
                                        <img src="https://designreset.com/cork/html/src/assets/img/twitter.svg" alt="" class="img-fluid">
                                        <span class="btn-text-inner">Twitter</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-center">
                                    <p class="mb-0">Already have an account ? <a href="javascript:void(0);" class="text-warning">Sign in</a></p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

</body>
