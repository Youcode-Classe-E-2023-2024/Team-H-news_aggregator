@include('partials.header')
</head>
<body class="layout-boxed" data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100">
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
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
@include('partials.navbar')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container " id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('partials.sidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">

            <div class="container">

                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="text-white" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li>Flux RSS Resource</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->

                <div id="navSection" data-bs-spy="affix" class="nav  sidenav">
                    <div class="sidenav-content">
                        <a href="#basic" class="active nav-link">Add Your Resource Info</a>
                    </div>
                </div>

                <div class="row layout-top-spacing">
                    <form action="{{route('addRss.store')}}" method="post">
                        @method('post')
                        @csrf

                        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Default</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" >@</span>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="name" value="{{old('name')}}">
                                </div>


                                <label for="basic-url" class="form-label">Your Resource URL</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="url" value="{{old('url')}}">
                                </div>

                                <div class="form-label">
                                    <input type="text" class="form-control" placeholder="Provider Name" name="provider" value="{{old('provider')}}">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" placeholder="category" name="category" value="{{old('category')}}">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">Description</span>
                                    <textarea class="form-control" aria-label="With textarea" name="description" value="{{old('description')}}"></textarea>
                                </div>
                                <div class="input-group">
                                    <input type="submit" name="submit" placeholder="Submit Resource" class="form-control mt-4 fw-bold shadow">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>


            </div>
        </div>

        <!--  BEGIN FOOTER  -->
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
            </div>
        </div>
        <!--  END FOOTER  -->

    </div>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->



</body>
@include('partials.footer')
