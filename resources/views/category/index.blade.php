<x-app>
    @push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush
    @section('title', __('category.category'))
    @section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('category.category') }}</li>
    @endsection
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">{{ __('category.category') }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="datatable table table-bordered table-striped text-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('category.labels.id') }}</th>
                                    <th>{{ __('category.labels.name') }}</th>
                                    <th>{{ __('category.labels.type') }}</th>
                                    <th>{{ __('category.labels.icon') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->icon }}</td>
                                    <td>
                                        <button class="btn btn-success mr-1" data-id="{{ $item->id }}" title="{{ __('category.title.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" data-id="{{ $item->id }}" title="{{ __('category.title.delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pagination-wrapper">
                            {{ $categories->links() }}
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <form action="{{ route('category.store') }}" method="POST">
                            <div class="form-group">
                                <label class="col-form-label" for="name">{{ __('category.labels.name') }}</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="type">{{ __('category.labels.type') }}</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="0">{{ __('category.option.income') }}</option>
                                    <option value="1">{{ __('category.option.expense') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="icon">{{ __('category.labels.icon') }}</label>
                                <input type="text" name="icon" id="icon" class="form-control">
                            </div>
                            <button class="btn btn-info">Save</button>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.card -->
    </div>

    @push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function () {
            $(".datatable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": [{
                    "extend": "collection",
                    "text": "Export",
                    "buttons": [
                        "copy", "csv", "excel", "pdf", "print"
                    ]
                }],
                "paging": false
            }).buttons().container().appendTo('.dataTables_wrapper .col-md-6:eq(0)');
        });
    </script>
    @endpush
</x-app>
