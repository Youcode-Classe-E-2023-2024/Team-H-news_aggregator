<x-layouts.admin-layout title="profile">

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                <!-- BREADCRUMB -->
                <div class="page-meta">
                </div>
                <!-- /BREADCRUMB -->
                <div class="account-settings-container layout-top-spacing">
                    <div class="account-content">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="tab-content" id="animateLineContent-4">
                                    <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                <form method="POST" action="{{ route('update_user') }}" enctype="multipart/form-data" class="section general-info">
                                                    @csrf

                                                    <div class="info">
                                                        <h6 class="">Modification de Profile</h6>
                                                        <div class="row">
                                                            <div class="col-lg-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                                        <div class="row w-100 profile-image  mt-4 pe-md-4  ">
                                                                            <div class="img-uploader-content">
                                                                                <input type="file" class="filepond" name="profile_image" accept="image/png, image/jpeg, image/gif"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                                        <div class="form">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="username">Username</label>
                                                                                        <input type="text" class="form-control mb-3" id="username" placeholder="Username" value="{{ Auth::user()->username }}" name="username">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 mt-1">
                                                                                    <div class="form-group text-end">
                                                                                        <button type="submit" class="btn btn-secondary">Save</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.admin-layout>
