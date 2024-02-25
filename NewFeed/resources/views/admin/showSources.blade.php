@include('partials.header')
<body class="layout-boxed" data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="140">
@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
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
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('partials.sidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">

        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">App</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->

                <div class="row layout-top-spacing">
                    <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                        <input id="t-text" type="text" name="searched" placeholder="Search" class="form-control" required="">
                    </div>
                    <form action="{{route('rss.send')}}" method="post" class="one">
                        @csrf
                        @method('post')
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3  ms-auto">
                                <select class="form-select form-select" aria-label="Default select example" name="category">
                                    <option class="option" selected="" value="0">All Category</option>
                                    <option class="option" value="users">News</option>
                                    <option class="option" value="crime">Crime</option>
                                    <option class="option" value="ufo">Ufo</option>
                                    <option class="option" value="technology">Technology</option>
                                </select>

                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 ">
                                <select class="form-select form-select" aria-label="Default select example" name="sort">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Oldest</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group d-flex justify-content-end row">
                            <div @class('col-4 hidden')></div>
                            <div @class('col-4 hidden')></div>
                            <input type="submit" name="submit" placeholder="Submit Resource" class="form-control my-4 fw-bold shadow col-2 text-center" style="margin-right: 17px">
                        </div>

                    </form>

                </div>

                <div class="row">

                    <div  class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                            <img src="{{asset('images/grid-blog-style-3.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body px-0 pb-0">
                                <h5 class="card-title mb-3">14 Tips to improve your photography</h5>
                                <div class="media mt-4 mb-0 pt-1">
                                    <img src="{{asset('images/profile-3.jpg')}}" class="card-media-image me-3" alt="">
                                    <div class="media-body">
                                        <h4 class="media-heading mb-1">Shaun Park</h4>
                                        <p class="media-text">01 May</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                            <img src="{{asset('images/grid-blog-style-1.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body px-0 pb-0">
                                <h5 class="card-title mb-3">The ideal work from home office setup</h5>
                                <div class="media mt-4 mb-0 pt-1">
                                    <img src="{{asset('images/profile-2.jpg')}}" class="card-media-image me-3" alt="">
                                    <div class="media-body">
                                        <h4 class="media-heading mb-1">Vanessa Kirby</h4>
                                        <p class="media-text">02 May</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @if(!empty($news))

                        @foreach($news as $new)
                            <div card class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    @if(is_null($new['image'] || empty($new['image'])))

                                    <img src="{{asset('images/grid-blog-style-3.jpg')}}" class="card-img-top" alt="...">
                                    @else
                                        <img src="{{$new['image']}}" class="card-img-top" alt="...">
                                    @endif
                                        <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">{{$new['description']}}</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                                <img src="{{asset('images/profile-3.jpg')}}" class="card-media-image me-3" alt="">
                                            <div class="media-body">
                                                <h4 class="media-heading mb-1">{{$new['title']}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        @endforeach

                    @else
                        @for($i = 0; $i <= 9; $i++)

                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <a href="app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                        <img src="{{asset('images/grid-blog-style-3.jpg')}}" class="card-img-top" alt="...">
                                        <div class="card-body px-0 pb-0">
                                            <h5 class="card-title mb-3">14 Tips to improve your photography</h5>
                                            <div class="media mt-4 mb-0 pt-1">
                                                <img src="{{asset('images/profile-3.jpg')}}" class="card-media-image me-3" alt="">
                                                <div class="media-body">
                                                    <h4 class="media-heading mb-1">Shaun Park</h4>
                                                    <p class="media-text">03 May</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        @endfor
                    @endif



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
        <!--  END CONTENT AREA  -->

    </div>
    <!--  END CONTENT AREA  -->
</div>

</body>
@include('partials.footer')
<script>

    const searched = document.getElementById('t-text');
    const cards = document.querySelectorAll('[card]');

    function getSearched() {
        console.log('cool');
        for (let i = 0; i < cards.length; i++) {
            if (!cards[i].innerHTML.includes(searched.value)) {
                cards[i].style.display = 'none';
            } else {
                cards[i].style.display = 'block';
            }
        }
    }

    searched.addEventListener('input', getSearched);


</script>
