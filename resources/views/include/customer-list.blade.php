@extends('master')

@section('title')
    Müşteri Listesi
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"/>
@endsection

@section('main')
    <div class="container">
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="bx bx-user"></i> Müşteriler</a></li>
                                <li class="breadcrumb-item active"><i class="bx bx-add-to-queue"></i> Müşteri Ekle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input" id="checkAll"></td>
                                            <th class="text-info">#</th>
                                            <th><i class="text-info bx bx-user"></i> Ad Soyad / Firma</th>
                                            <th><i class="text-info bx bx-envelope"></i> E-Posta Adresi</th>
                                            <th><i class="text-info bx bx-phone"></i> Telefon Numarası</th>
                                            <th><i class="text-info bx bxl-slack"></i> İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td width="5">
                                                    <input type="checkbox" class="form-check-input" name="check_del">
                                                </td>
                                                <td>{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</td>
                                                <td>{{ $customer->full_name }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->telephone }}</td>
                                                <td width="20">
                                                    <a class="btn btn-sm text-success" title="Düzenle"
                                                       href="{{ route('edit-customer', $customer->id) }}">
                                                        <i class="bx bx-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm text-danger" title="Sil"
                                                       href="{{ route('delete-customer', $customer->id) }}">
                                                        <i class="bx bx-trash"></i>
                                                    </a>
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
                <!--end row-->
            </div>
        </div>
        <!--end page wrapper -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
@endsection
