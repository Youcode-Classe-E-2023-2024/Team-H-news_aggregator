<x-layouts.admin-layout title="Dashboard">
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">

                <div class="row layout-top-spacing">
                    <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                        <input id="t-text" type="text" name="searched" placeholder="Search" class="form-control" required="">
                    </div>
                    <h2>Posts:</h2>
                    <form action="{{route('rss.send')}}" method="post" class="one">
                        @csrf
                        @method('post')
                        <div class="row mb-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3  ms-auto">
                                <select class="form-select form-select" aria-label="Default select example" name="category">
                                    <option class="option" selected="" value="0">All Category</option>
                                    @foreach($categories as $categorie)
                                        <option class="option" value="{{ $categorie->id}}">{{$categorie->name}}</option>
                                    @endforeach
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
                    @if(!empty($postsPaginated))

                        @foreach($postsPaginated as $post)
                            <div card class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    @if(is_null($post['image'] || empty($post['image'])))

                                        <img src="{{asset('images/grid-blog-style-3.jpg')}}" class="card-img-top" alt="...">
                                    @else
                                        <img src="{{$post['image']}}" class="card-img-top" alt="...">
                                    @endif
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">{{$post['description']}}</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <img src="{{asset('images/profile-3.jpg')}}" class="card-media-image me-3" alt="">
                                            <div class="media-body">
                                                <h4 class="media-heading mb-1">{{$post['title']}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        @endforeach
                        <div class="pagination">
                            {{-- Custom pagination links --}}
                            @if ($postsPaginated->currentPage() > 1)
                                <a href="{{ $postsPaginated->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
                            @endif

                            @for ($i = 1; $i <= $postsPaginated->lastPage(); $i++)
                                <a href="{{ $postsPaginated->url($i) }}">{{ $i }}</a>
                            @endfor

                            @if ($postsPaginated->currentPage() < $postsPaginated->lastPage())
                                <a href="{{ $postsPaginated->nextPageUrl() }}" rel="next">Next &raquo;</a>
                            @endif
                        </div>

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

    </div>
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

        const pagination = document.getElementsByClassName('pagination');
    </script>
</x-layouts.admin-layout >
