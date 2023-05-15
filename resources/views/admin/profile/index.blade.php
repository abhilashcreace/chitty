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
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-settings mr-10"></i>Profile
                                    Update
                                </h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" action="{{ route('admin-profile-update') }}">
                                            @csrf
                                            <div class=" form-body">
                                                <hr class="light-grey-hr" />
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{$profile->name}}" placeholder="Name" required>
                                                            @error('name')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Email</label>
                                                            <input type="text" name="email" value="{{$profile->email}}"
                                                                class=" form-control" placeholder="Email" required>
                                                            @error('email')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Username</label>
                                                            <input type="text" name="username"
                                                                value="{{$profile->username}}" class=" form-control"
                                                                placeholder="Username" required>
                                                            @error('username')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
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
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-settings mr-10"></i>Change
                                    Password
                                </h6>
                                <hr class="light-grey-hr" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" id="password" action="{{ route('password-update') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Old Password</label>
                                                <input type="password" id="old_password" name="old_password"
                                                    class="form-control" value="{{old('old_password')}}"
                                                    placeholder="Old Password" required>
                                                @error('old_password')
                                                <code>{{ $message }}</code>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">New Password</label>
                                                <input type="password" id="new_password" name="new_password"
                                                    value="{{old('new_password')}}" class=" form-control"
                                                    placeholder="Name Password" required>
                                                @error('new_password')
                                                <code>{{ $message }}</code>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Confirm Password</label>
                                                <input type="password" id="confirm_password" name="confirm_password"
                                                    value="{{old('confirm_password')}}" class=" form-control"
                                                    placeholder="Confirm Password" required>
                                                @error('confirm_password')
                                                <code>{{ $message }}</code>
                                                @enderror
                                            </div>
                                            <button type="submit"
                                                class="btn btn-info waves-effect waves-light">Submit</button>
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