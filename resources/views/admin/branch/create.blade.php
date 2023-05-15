@include('admin/layouts.header')

<body>
    <div id="wrapper">
        @include('admin/layouts.navbar')
        @include('admin/layouts.leftmenu')
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Chitty</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{ route('branch-manage') }}">Branch</a>
                                        </li>
                                        <li class="breadcrumb-item active">Add</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-settings mr-10"></i>Create
                                    Branch
                                </h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" action="{{ route('branch-save') }}">
                                            @csrf
                                            <div class=" form-body">
                                                <hr class="light-grey-hr" />
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Name" required>
                                                            @error('name')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Code</label>
                                                            <input type="text" name="branch_code" class="form-control"
                                                                placeholder="Branch Code">
                                                            @error('branch_code')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Address</label>
                                                            <textarea name="address" class="form-control"
                                                                placeholder="Address"></textarea>
                                                            @error('address')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions mt-10">
                                                <button type="submit" class="btn btn-success  mr-10">
                                                    Add</button>
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
        @include('admin/layouts.js')

        <script>
            @if($success = session('success'))
            swal.fire({
            title: "",
            type: "success",
            text: "{{ $success }}",
            confirmButtonColor: "#01c853",
            }).then((result) => {
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
            location.reload();
            });
            @endif
        </script>

</body>

</html>