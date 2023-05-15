@include('admin/layouts.header')
<link href="{{asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />


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
                                        <li class="breadcrumb-item active">List</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Manage Scheme</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <h4 class="header-title">
                                    <a href="{{ route('scheme-create') }}"
                                        class="btn btn-info waves-effect waves-light">Add New</a>
                                </h4>
                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Amount</th>
                                            <th>Months</th>
                                            <th>Scheme List</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schemes as $scheme)
                                        <tr>
                                            <td>{{$scheme->name}}</td>
                                            <td>{{$scheme->scheme_code}}</td>
                                            <td>{{$scheme->amount}}</td>
                                            <td>{{$scheme->months}}</td>
                                            <td>@if($scheme->status == 1)
                                                <a href="{{ route('scheme-create-list', ['id'=>$scheme->uuid]) }}"
                                                    class="btn btn-info waves-effect waves-light" data-toggle="tooltip"
                                                    data-original-title="Add List">
                                                    <i class="mdi mdi-view-day"></i> Add New</a>

                                                <a href="{{ route('scheme-list-view', ['id'=>$scheme->uuid]) }}"
                                                    class="btn btn-success waves-effect waves-light"
                                                    data-toggle="tooltip" data-original-title="Add List">
                                                    <i class="mdi mdi-eye"></i> View</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($scheme->status == 1)
                                                <button class="btn btn-success waves-effect waves-light btn-xs">
                                                    Active</button>
                                                @else
                                                <button
                                                    class="btn btn-danger waves-effect waves-light btn-xs">Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('scheme-edit', ['id'=>$scheme->uuid]) }}"
                                                    class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i
                                                        class="mdi mdi-circle-edit-outline"></i> </a>

                                                @if($scheme->status == 1)

                                                <a href="javascript:void(0)" onclick="changeStatus(this)"
                                                    data-id="{{ $scheme->uuid }}" data-toggle="tooltip"
                                                    data-original-title="Inactive"><i class="mdi mdi-close"></i></a>
                                                @else

                                                <a href="javascript:void(0)" onclick="changeStatus(this)"
                                                    data-id="{{ $scheme->uuid }}" data-toggle="tooltip"
                                                    data-original-title="Restore"><i class="mdi mdi-restore"></i></a>

                                                <a href="javascript:void(0)" onclick="schemeDelete(this)"
                                                    data-id="{{ $scheme->uuid }}" data-toggle="tooltip"
                                                    data-original-title="Delete"><i class="mdi mdi-trash-can"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin/layouts.js')

        <script src="{{asset('admin/assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{asset('admin/assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatables init -->
        <script src="{{asset('admin/assets/js/pages/datatables.init.js')}}"></script>

        <script>
            function changeStatus(e)
            {
            let id = e.getAttribute('data-id');
            var url = '{{ url('admin/scheme-changeStatus') }}/' + id;
            swal.fire({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#fec107",
            confirmButtonText: "Yes, change it!",
            }).then((result) => {
            if(result.value == true){
            $.ajax({
            type: "POST",
            headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: url,
            success: function(data) {
            swal.fire({title: "Status Changed!", text: "Scheme Status Changed!", type:
            "success"}).then(function(){
            location.reload();
            }
            );
            },
            error: function(e) {
            swal.fire("Error", "Please try again", "error");
            },
            });
            }
            });
            return false;
            }


            function schemeDelete(e)
            {
            let id = e.getAttribute('data-id');
            var url = '{{ url('admin/scheme-delete') }}/' + id;
            swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#fec107",
            confirmButtonText: "Yes, delete it!",
            }).then((result) => {
            if(result.value == true){
            $.ajax({
            type: "POST",
            headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: url,
            success: function(data) {
            swal.fire({title: "Deleted!", text: "data Deleted!", type:
            "success"}).then(function(){
            location.reload();
            }
            );
            },
            error: function(e) {
            swal.fire("Error", "Please try again", "error");
            },
            });
            }
            });
            return false;
            }

        </script>

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