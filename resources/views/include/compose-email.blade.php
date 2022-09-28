@extends('master')

@section('title')
    Toplu Mail Oluşturma
@endsection

@section('css')
    <style>
        .tox-notifications-container {
            display: none !important;
        }

        .theme-img div img {
            height: 200px;
            display: block;
            float: left;
            border-radius: 4px;
            margin: 5px;
        }
    </style>
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
                                    <a href="#"><i class="bx bx-envelope"></i> Mail Yönetimi</a></li>
                                <li class="breadcrumb-item active"><i class="bx bx-add-to-queue"></i> Mail Oluşturma
                                </li>
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
                                <form action="{{ route('compose-email-post') }}" method="POST"
                                      enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label">Başlık</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ old('title') }}"
                                               placeholder="başlık giriniz...">
                                        <div class="invalid-tooltip">Lütfen bu alanı doldurunuz!</div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label">Mesaj</label>
                                        <textarea class="text-editor" name="description"
                                                  placeholder="mesajınızı giriniz...">{{ old('description') }}</textarea>
                                        <div class="invalid-tooltip">Lütfen bu alanı doldurunuz!</div>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label">Tema</label>
                                        <select class="form-control" name="theme" id="theme_selector">
                                            <option value="" selected disabled>--- Tema Seç ---</option>
                                            <option value="1" @selected( old('theme'))>Şablon v1</option>
                                            <option value="2" @selected( old('theme'))>Şablon v2</option>
                                            <option value="3" @selected( old('theme'))>Şablon v3</option>
                                        </select>
                                        <div class="invalid-tooltip">Lütfen bir tema seçiniz!</div>
                                        <div class="row mt-3 theme-img">
                                            <div class="col-md-9 mt-2">
                                                <h6>Temalar:</h6>
                                                <img class="img-fluid" alt="tema-v1 resmi" title="tema-v1"
                                                     src="{{asset('/assets/images/emails/theme_v1.png')}}">
                                                <img class="img-fluid" alt="tema-v2 resmi" title="tema-v2"
                                                     src="{{asset('/assets/images/emails/theme_v2.png')}}">
                                                <img class="img-fluid" alt="tema-v3 resmi" title="tema-v3"
                                                     src="{{asset('/assets/images/emails/theme_v3.png')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit" name="submit">
                                            <i class="bx bx-save"></i> Gönder
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
    <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'
            referrerpolicy="origin">
    </script>
    <script>
        tinymce.init({
            selector: '.text-editor',
            height: "300"
        });
    </script>
@endsection
