@extends('layouts.master')

@section('contentHeaderTitle', 'Buat Video')

@section('contentHeaderExtra')
@endsection

@section('mainContent')
    @routes('categories.*')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form role="form" action="{{ route('admin.videos.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input name="title" type="text" class="form-control" required
                                           placeholder="Masukkan judul video" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="url">Link Youtube</label>
                                    <input name="url" type="text" class="form-control" required
                                           placeholder="Masukkan link youtube">
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi <small>(opsional)</small></label>
                                    <textarea name="description" class="textarea"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Kanal</label>
                                    <select name="channel" class="form-control select2" required style="width: 100%;">
                                        <option value="">Pilih Kanal</option>
                                        @foreach($channels as $channel)
                                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Saluran</label>

                                    <select id="category" name="category" required class="form-control select2"
                                            style="width: 100%;">
                                        <option value="">Pilih Saluran</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kategori <small>(opsional)</small></label>
                                    <select id="subcategory" name="subcategory" class="form-control select2"
                                            style="width: 100%;">
                                        <option value="">Pilih Kategori</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Label <small>(opsional)</small></label>
                                    <select id="label" name="labels[]" class="select2" multiple="multiple"
                                            data-placeholder="Pilih Label" style="width: 100%;">
                                        <option value="">Pilih Label</option>
                                    </select>
                                </div>

                                <!-- time Picker -->
                                <div class="form-group">
                                    <label>Waktu Publikasi</label>
                                    <div class="icheck-material-blue">
                                        <input type="radio" id="now" name="publishNow" value="on" checked/>
                                        <label for="now">Segera</label>
                                    </div>
                                    <div class="icheck-material-blue">
                                        <input type="radio" id="later" name="publishNow" value="off"/>
                                        <label for="later">Atur Jadwal</label>
                                    </div>
                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#timepicker"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        <input id="timeField" name="publishedAt"
                                               disabled
                                               type="text" class="form-control"
                                               data-target="#timepicker" data-toggle="datetimepicker"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="icheck-material-blue">
                                        <input type="checkbox" id="show" name="showUpload" />
                                        <label for="show">Tampilkan Waktu Unggah</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="action" value="publish">Unggah & Terbitkan
                                </button>
                                <button type="submit" class="btn btn-link" name="action" value="draft"
                                        data-toggle="tooltip" data-placement="top" title="Video ini tidak akan dipublikasi">
                                Simpan Sebagai Draft
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

<!-- STYLES & SCRIPTS -->
@prepend('styles')
    <!-- iCheckMaterial CSS -->
    <link rel="stylesheet" href="{{ asset("assets/dist/css/icheck-material.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset("assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css") }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/select2/css/select2.min.css") }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/summernote/summernote-bs4.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("assets/dist/css/adminlte.min.css") }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endprepend

@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset("assets/plugins/jquery/jquery.min.js") }}"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- Select2 -->
    <script src="{{ asset("assets/plugins/select2/js/select2.full.min.js") }}"></script>
    <!-- Moment JS -->
    <script src="{{ asset("assets/plugins/moment/moment.min.js") }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset("assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset("assets/dist/js/adminlte.min.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset("assets/dist/js/demo.js") }}"></script>
    <!-- Summernote -->
    <script src="{{ asset("assets/plugins/summernote/summernote-bs4.min.js") }}"></script>
    <script type="text/javascript">
        // tooltip
        $('[data-toggle="tooltip"]').tooltip()

        //Initialize Select2 Elements
        $('.select2').select2();

        // Summernote
        $('.textarea').summernote({
            height: 300
        });

        $('#category').on('change', function () {
            let selectedCategoryID = $(this).find(':selected').attr('value');
            $('#subcategory').empty();
            $('#label').empty();
            $('#subcategory').append('<option value="">Pilih Kategori </option>');
            $('#label').append('<option value="">Pilih Label</option>');

            if (selectedCategoryID) {
                $.ajax({
                    url: route('allSubcategories', {categoryId: selectedCategoryID}),
                    success: function (response) {
                        for (let i = 0; i < response.data.length; i++) {
                            let id = response.data[i].id;
                            let name = response.data[i].name;
                            $('#subcategory').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                })
            }
        });

        $('#subcategory').on('change', function () {
            let selectedCategoryID = $(this).find(':selected').attr('value');
            let selectedSubcategoryID = $(this).find(':selected').attr('value');
            $('#label').empty();
            $('#label').append('<option value="">Pilih Label</option>');

            if (selectedSubcategoryID) {
                $.ajax({
                    url: route('allLabels', {categoryId: selectedCategoryID, subcategoryId: selectedSubcategoryID}),
                    success: function (response) {
                        for (let i = 0; i < response.data.length; i++) {
                            let id = response.data[i].id;
                            let name = response.data[i].name;
                            $('#label').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                })
            }
        });

        //Timepicker
        $('#timepicker').datetimepicker(
            {
                format: 'DD/MM/YYYY HH:mm',
                icons:
                    {
                        time: 'fas fa-clock',
                        date: 'fas fa-calendar',
                        up: 'fas fa-arrow-up',
                        down: 'fas fa-arrow-down',
                        previous: 'fas fa-arrow-circle-left',
                        next: 'fas fa-arrow-circle-right',
                        today: 'far fa-calendar-check-o',
                        clear: 'fas fa-trash',
                        close: 'far fa-times'
                    },
            }
        );


        $('#now').change(
            function () {
                if ($(this).is(':checked')) {
                    $('#timeField').attr('disabled', true);
                    $('#timeField').attr('required', false)
                }
            });

        $('#later').change(
            function () {
                if ($(this).is(':checked')) {
                    $('#timeField').attr('disabled', false);
                    $('#timeField').attr('required', true)
                }
            });
    </script>
@endpush
