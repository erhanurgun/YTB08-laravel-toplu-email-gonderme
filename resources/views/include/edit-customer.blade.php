@extends('master')

@section('title')
    Müşteri Düzenleme
@endsection

@section('css')

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
                                <li class="breadcrumb-item active"><i class="bx bx-add-to-queue"></i> Müşteri Düzenleme</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col">
                        @if($errors->any())
                            <ul class="alert alert-danger px-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('edit-customer-post', $customer->id) }}" method="POST"
                                      class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label">Ad Soyad / Firma</label>
                                        <input type="text" class="form-control" name="full_name"
                                               value="{{ old('full_name') ?? $customer->full_name }}"
                                               placeholder="müşteri adı / firma adı giriniz...">
                                        <div class="invalid-tooltip">Lütfen bu alanı doldurunuz!</div>
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">E-Posta</label>
                                        <input type="email" class="form-control" name="email"
                                               value="{{ old('email') ?? $customer->email }}"
                                               placeholder="e-posta giriniz...">
                                        <div class="invalid-tooltip">Lütfen bu alanı mail formatına göre doldurunuz!
                                        </div>
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Telefon</label>
                                        <input type="text" class="form-control" name="telephone"
                                               value="{{ old('telephone') ?? $customer->telephone }}"
                                               placeholder="telefon giriniz...">
                                        <div class="invalid-tooltip">Lütfen bu alanı telefon formatına göre
                                            doldurunuz!
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit" name="submit">
                                            <i class="bx bx-save"></i> Kaydet
                                        </button>
                                    </div>
                                </form>
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

@endsection
