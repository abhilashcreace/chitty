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
                                        <li class="breadcrumb-item"><a href="{{ route('scheme-manage') }}">Scheme</a>
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
                                    Scheme
                                </h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST"
                                            action="{{ route('scheme-list-update', ['id'=>$schemelist->uuid]) }}">
                                            @csrf
                                            <div class=" form-body">
                                                <hr class="light-grey-hr" />
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Month Count</label>

                                                            <input type="hidden" name="scheme_id"
                                                                value="{{$schemelist->scheme_id}}">


                                                            <input type="text" name="month" class="form-control"
                                                                placeholder="Month" value="{{$schemelist->month}}"
                                                                required>

                                                            @error('month')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Subs</label>
                                                            <input type="text" name="subs" value="{{$schemelist->subs}}"
                                                                class="form-control" placeholder="Subs">
                                                            @error('subs')
                                                            <span class="help-block">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Cum</label>
                                                            <input type="text" name="cum" value="{{$schemelist->cum}}"
                                                                class="form-control" placeholder="Cum" required>
                                                            @error('cum')
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