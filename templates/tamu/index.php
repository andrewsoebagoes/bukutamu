<?php load_templates('layouts/top') ?>
<div class="content">
    <div class="panel-header <?= config('theme')['panel_color'] ?>">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold"><?= _ucwords(__($table)) ?></h2>
                    <h5 class="text-white op-7 mb-2">Memanajemen <?= _ucwords(__($table)) ?></h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php if ($success_msg) : ?>
                            <div class="alert alert-success"><?= $success_msg ?></div>
                        <?php endif ?>
                        <div class="row mb-3">
                            <a href="<?= routeTo('tamu/export') ?>" class="btn btn-sm btn-success mr-2"><i class="fas fa-print"></i> Export Excel</a>
                            <button class="btn btn-sm btn-primary text-white " onclick="showHideFilter(this)"><i class="fas fa-search"></i> Filter</button>
                        </div>
                        <form action="<?= routeTo('tamu/index') ?>" method="post" id="searchForm">
                            <div class="col-md-6 mb-2" style="display:none" id="bodyFilter">
                                <?php
                                $field_name     = "provinsi";
                                $field_title    = "Provinsi";
                                $required       = false;
                                ?>
                                <div class="form-group">
                                    <label for="<?= $field_name; ?>"><?= $field_title; ?> <?= $required ? '<sup class="text-danger">*</sup>' : null; ?></label>
                                    <select name="<?= $field_name; ?>" id="<?= $field_name; ?>" class="form-control select2" <?= $required ? 'required' : null; ?>>
                                        <option value="">Pilih <?= $field_title; ?></option>
                                    </select>
                                </div>

                                <?php
                                $field_name     = "kabupaten";
                                $field_title    = "Kota";
                                $required       = false;
                                ?>
                                <div class="form-group">
                                    <label for="<?= $field_name; ?>"><?= $field_title; ?> <?= $required ? '<sup class="text-danger">*</sup>' : null; ?></label>
                                    <select name="<?= $field_name; ?>" id="<?= $field_name; ?>" class="form-control select2" <?= $required ? 'required' : null; ?>>
                                        <option value="">Pilih <?= $field_title; ?></option>
                                    </select>
                                </div>

                                <?php
                                $field_name     = "kecamatan";
                                $field_title    = "Kecamatan";
                                $required       = false;
                                ?>
                                <div class="form-group">
                                    <label for="<?= $field_name; ?>"><?= $field_title; ?> <?= $required ? '<sup class="text-danger">*</sup>' : null; ?></label>
                                    <select name="<?= $field_name; ?>" id="<?= $field_name; ?>" class="form-control select2" <?= $required ? 'required' : null; ?>>
                                        <option value="">Pilih <?= $field_title; ?></option>
                                    </select>
                                </div>

                                <?php
                                $field_name     = "desa";
                                $field_title    = "Kelurahan";
                                $required       = false;
                                ?>
                                <div class="form-group">
                                    <label for="<?= $field_name; ?>"><?= $field_title; ?> <?= $required ? '<sup class="text-danger">*</sup>' : null; ?></label>
                                    <select name="<?= $field_name; ?>" id="<?= $field_name; ?>" class="form-control select2" <?= $required ? 'required' : null; ?>>
                                        <option value="">Pilih <?= $field_title; ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <select name="keperluan_id" id="keperluan_id" class="form-control">
                                        <option value="">Pilih Keperluan</option>
                                        <?php foreach ($keperluan as $k) : ?>
                                            <option value="<?= $k->id . "," . $k->keperluan ?>"><?= $k->keperluan ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" id="btnCari">Cari</button>
                            </div>
                        </form>

                        <div class="table-responsive table-hover table-sales">
                            <table class="table datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th width="20px">#</th>
                                        <?php
                                        foreach ($fields as $field) :
                                            $label = $field;
                                            if (is_array($field)) {
                                                $label = $field['label'];
                                            }
                                            $label = _ucwords($label);
                                        ?>
                                            <th><?= $label ?></th>
                                        <?php endforeach ?>
                                        <th class="text-right">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php load_templates('layouts/bottom') ?>


<script>
    $.ajax({
        url: "https://staggingabsensi.labura.go.id/api-wilayah-indonesia/static/api/provinces.json",
        post: "get",
        beforeSend: function() {
            $('#provinsi').html('<option value="">Pilih Provinsi</option>')
        },
        success: function(res) {
            if (res) {
                $.each(res, function(i, v) {
                    $('#provinsi').append('<option value="' + v.id + ',' + v.name + '">' + v.name + '</option>')
                });
            }
        }
    })


    $('#provinsi').change(function() {
        var provinsikab = $(this).val().split(',');
        return getKabupaten(provinsikab.length > 0 ? provinsikab[0] : null);
    })

    function getKabupaten(provinsi_id) {
        $.ajax({
            url: "https://staggingabsensi.labura.go.id/api-wilayah-indonesia/static/api/regencies/" + provinsi_id + ".json",
            post: "get",
            beforeSend: function() {
                $('#kabupaten').html('<option value="">Pilih Kabupaten</option>')
            },
            success: function(res) {
                if (res) {
                    $.each(res, function(i, v) {
                        $('#kabupaten').append('<option value="' + v.id + ',' + v.name + '">' + v.name + '</option>')
                    })
                }
            }
        })
    }

    $('#kabupaten').change(function() {
        var kabupatenKec = $(this).val().split(',');
        return getKecamatan(kabupatenKec.length > 0 ? kabupatenKec[0] : null);
    })

    function getKecamatan(kecamatan_id) {
        $.ajax({
            url: "https://staggingabsensi.labura.go.id/api-wilayah-indonesia/static/api/districts/" + kecamatan_id + ".json",
            post: "get",
            beforeSend: function() {
                $('#kecamatan').html('<option value="">Pilih Kecamatan</option>')
            },
            success: function(res) {
                if (res) {
                    $.each(res, function(i, v) {
                        $('#kecamatan').append('<option value="' + v.id + ',' + v.name + '">' + v.name + '</option>')
                    })
                }
            }
        })
    }

    $('#kecamatan').change(function() {
        var kecamatanDesa = $(this).val().split(',');
        return getDesa(kecamatanDesa.length > 0 ? kecamatanDesa[0] : null);
    })

    function getDesa(kecamatan_id) {
        $.ajax({
            url: "https://staggingabsensi.labura.go.id/api-wilayah-indonesia/static/api/villages/" + kecamatan_id + ".json",
            post: "get",
            beforeSend: function() {
                $('#desa').html('<option value="">Pilih Desa</option>')
            },
            success: function(res) {
                if (res) {
                    $.each(res, function(i, v) {
                        $('#desa').append('<option value="' + v.id + ',' + v.name + '">' + v.name + '</option>')
                    })
                }
            }
        })
    }


    function showHideFilter(el) {
        if ($('#bodyFilter').is(":visible")) {
            $(el).removeClass("text-info").addClass("text-default")
            return $('#bodyFilter').slideUp()
        }
        $(el).removeClass("text-default").addClass("text-info")
        $('#bodyFilter').slideDown()
    }

    getFilter();
    $('#btnCari').click(function() {
        return getFilter()
    })
    var gettingFilter = false

    function getFilter() {
        if(gettingFilter) return false
        $('.datatable').dataTable().destroy();
        $('.datatable').dataTable({
            stateSave: true,
            pagingType: 'full_numbers_no_ellipses',
            processing: true,
            search: {
                return: true
            },
            serverSide: true,
            ajax: {
                url: "<?= routeTo('tamu') ?>",
                type: "POST",
                data: {
                    filter_provinsi: $('#filter_provinsi').val(),
                    filter_kabupaten: $('#filter_kabupaten').val(),
                    filter_kecamatan: $('#filter_kecamatan').val(),
                    filter_desa: $('#filter_desa').val(),
                    filter_keperluan: $('#filter_keperluan').val()
                },
                beforeSend: function() {
                    $('#datatable_wrapper .row .col-sm-12').addClass('table-responsive');
                    gettingFilter = true
                },
                error: function(a, b, c) {
                    $('#datatable_wrapper .row .col-sm-12').addClass('table-responsive');
                    gettingFilter = false
                }
            },
            fnInitComplete: function(oSettings, json) {
                $('#datatable_wrapper .row .col-sm-12').addClass('table-responsive');
                gettingFilter = false


            },
        })
    }
</script>