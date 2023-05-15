@include('admin/layouts.header')

<body>
    <div id="wrapper">
        @include('admin/layouts.navbar')

        @include('admin/layouts.leftmenu')
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('admin-dashboard') }}">Kalakaumudi</a></li>
                                        <li class="breadcrumb-item active">Settings</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Settings</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-settings mr-10"></i>Settings
                                    Update
                                </h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" action="{{ route('admin-settings-update') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class=" form-body">
                                                <hr class="light-grey-hr" />
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Default Password</label>
                                                            <input type="text" name="default_password"
                                                                class="form-control"
                                                                value="{{$settings->default_password}}"
                                                                placeholder="Default Password">
                                                            @error('default_password')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Email</label>
                                                            <input type="text" name="email" value="{{$settings->email}}"
                                                                class="form-control" placeholder="Email">
                                                            @error('email')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Phone 1</label>
                                                            <input type="text" name="phone1"
                                                                value="{{$settings->phone1}}" class=" form-control"
                                                                placeholder="Phone 1">
                                                            @error('phone1')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Phone 2</label>
                                                            <input type="text" name="phone2"
                                                                value="{{$settings->phone2}}" class=" form-control"
                                                                placeholder="Phone 2">
                                                            @error('phone2')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Mobile</label>
                                                            <input type="text" name="mobile"
                                                                value="{{$settings->mobile}}" class=" form-control"
                                                                placeholder="Mobile">
                                                            @error('mobile')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Address</label>
                                                            <textarea name="address"
                                                                class="form-control">{{$settings->address}}</textarea>
                                                            @error('address')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Copyright Content</label>
                                                            <textarea name="copyright_content"
                                                                class="form-control">{{$settings->copyright_content}}</textarea>
                                                            @error('copyright_content')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Default Image</label>
                                                            <input type="file" name="default_image" id="default_image"
                                                                class="form-control">
                                                            </br>
                                                            <img id="change_default_image" height="100px" width="100px"
                                                                @if(!empty($settings->default_image))
                                                            src="{{
                                                            asset($settings->default_image) }}"
                                                            @else
                                                            src="{{asset('uploads/default/no-image.png')}}"
                                                            @endif/>
                                                            @error('default_image')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Logo</label>
                                                            <input type="file" name="logo" id="logo"
                                                                class="form-control">
                                                            </br>
                                                            <img id="change_logo" height="100px" width="100px"
                                                                @if(!empty($settings->logo))
                                                            src="{{
                                                            asset($settings->logo) }}"
                                                            @else
                                                            src="{{asset('uploads/default/no-image.png')}}"
                                                            @endif/>
                                                            @error('logo')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Fav Icon</label>
                                                            <input type="file" name="fav_icon" id="fav_icon"
                                                                class="form-control">
                                                            <img id="change_fav_icon" height="100px" width="100px"
                                                                @if(!empty($settings->fav_icon))
                                                            src="{{
                                                            asset($settings->fav_icon) }}"
                                                            @else
                                                            src="{{asset('uploads/default/no-image.png')}}"
                                                            @endif/>
                                                            @error('fav_icon')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Facebook URL</label>
                                                            <input type="text" name="facebook_url"
                                                                value="{{$settings->facebook_url}}"
                                                                class=" form-control" placeholder="Facebook URL">
                                                            @error('facebook_url')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Twitter URL</label>
                                                            <input type="text" name="twitter_url"
                                                                value="{{$settings->twitter_url}}" class=" form-control"
                                                                placeholder="Twitter URL">
                                                            @error('twitter_url')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Instagram URL</label>
                                                            <input type="text" name="instagram_url"
                                                                value="{{$settings->instagram_url}}"
                                                                class=" form-control" placeholder="Instagram URL">
                                                            @error('instagram_url')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions mt-10">
                                                <button type="submit" class="btn btn-success  mr-10">
                                                    Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->



            @include('admin/layouts.footer')

        </div>

        @include('admin/layouts.js')


        <script>
            $(document).ready(function (){
            
            $('#default_image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
            $('#change_default_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
            });

            $('#logo').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
            $('#change_logo').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
            });

            $('#fav_icon').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
            $('#change_fav_icon').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
            });

            
            });


            @if($success = session('success'))
                swal.fire({
                  title: "",
                  type: "success",
                  text: "{{ $success }}",
                  confirmButtonColor: "#01c853",
                }).then((result) => {
                // Reload the Page
                location.reload();
                });
                @endif

                @if($error = session('error'))
                swal.fire({
                title: "",
                type: "error",
                text: "{{ $error }}",
                confirmButtonColor: "#01c853",
                }).then((result) => {
                // Reload the Page
                location.reload();
                });
                @endif
        </script>

</body>

</html>