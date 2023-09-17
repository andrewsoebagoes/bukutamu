<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Buku Tamu - Khazanah Ilmu</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= asset('assets/img/logokhazanah1.jpeg') ?>" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />

	<!-- Fonts and icons -->
	<script src="<?= asset('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['<?= asset('assets/css/fonts.min.css') ?>']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>">
	<style>
		.centered {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		#pac-input {
			left: 176px !important;
			top: 5px !important;
			padding: 10px 20px;
			width: 100%;
			font-size: 22px;
			max-width: 410px;
			border-radius: 5px;
			display: none;
		}

		.pac-container {
			z-index: 999999999;
		}

		.pac-item {
			cursor: pointer;
			padding: 4px 15px;
			-o-text-overflow: ellipsis;
			text-overflow: ellipsis;
			overflow: hidden;
			white-space: nowrap;
			line-height: 30px;
			text-align: left;
			border-top: 1px solid #e6e6e6;
			font-size: 16px;
			color: #515151;
		}
	</style>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
		<div class="container-fluid pl-4">
			<a class="navbar-brand" href="#">Buku Tamu</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>

				</ul>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item">
						<a class="nav-link" href="<?=routeTo('auth/login')?>">Login</a>
					</li>

				</ul>
			</div>
	</nav>
	<div class="container">

		<div class="card m-4">
			<div class="card-body">
				<?php if ($success_msg) : ?>
					<div class="alert alert-success"><?= $success_msg ?></div>
				<?php endif ?>
				<form method="post" action="" id="myForm">
					<input type="hidden" name="alamat_lengkap" id="alamat_lengkap">

					<div class="form-group">
						<label for="namatamu">Nama Tamu</label>
						<input type="text" class="form-control" name="namatamu" id="namatamu" placeholder="Masukan Nama Tamu">
					</div>

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
					$field_title    = "Kabupaten";
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
					$field_title    = "Desa";
					$required       = false;
					?>
					<div class="form-group">
						<label for="<?= $field_name; ?>"><?= $field_title; ?> <?= $required ? '<sup class="text-danger">*</sup>' : null; ?></label>
						<select name="<?= $field_name; ?>" id="<?= $field_name; ?>" class="form-control select2" <?= $required ? 'required' : null; ?>>
							<option value="">Pilih <?= $field_title; ?></option>
						</select>
					</div>


					<div class="form-group">
						<p>Titik Koordinat</p>
						<div id="mapPicker" style="width:100%;height:27vh;"></div>
						<div class="text-right mt-2">
							<div class="m-2">
								<button id="confirmPosition" type="button" class="btn btn-info text-white">Pilih</button>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-6" style="padding-right: 5px">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">lat</span>
									</div>
									<?php
									$field_name     = "latitude";
									$field_title    = "Latitude";
									$field_required = false;
									?>
									<input type="text" readonly class="form-control" name="<?= $field_name; ?>" id="<?= $field_name; ?>">
								</div>
							</div>
							<div class="col-6" style="padding-left: 5px">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">lng</span>
									</div>
									<?php
									$field_name     = "longitude";
									$field_title    = "Longitude";
									$field_required = false;
									?>
									<input type="text" readonly class="form-control" name="<?= $field_name; ?>" id="<?= $field_name; ?>">
								</div>
							</div>
						</div>
						<!-- <button class="btn btn-sm btn-outline-info mb-2" type="button" onclick="pickKordinat(this)">
							<img src="<?= base_url('assets/img/icon/marker.svg'); ?>" width="20" alt="">
							Pilih Koordinat
						</button> -->
					</div>

					<div class="row mb-2 serikat">
						<div class="col-md-12 col-form-label" id="dataSerikat">
							<label for="Data Ananda">Data Ananda</label>

						</div>
					</div>

					<div class="row mb-2 serikat">

						<div class="form-group ml-3 mb-0">

							<a class="btn btn-sm btn-outline-primary" id="btnTambah" style="padding-left: 12px;padding-right: 12px;height: 36px;">+</a>
							<a class="btn btn-sm btn-outline-danger" id="btnKurang" style="padding-left: 12px;padding-right: 12px;height: 36px;">x</a>

						</div>
					</div>

					<div class="form-group">
						<label for="asalsekolah">Asal Sekolah</label>
						<input type="text" class="form-control" name="asalsekolah" id="asalsekolah" placeholder="Masukan Asal Sekolah">
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
					<div class="form-group">
						<label for="no_wa">No Whatsapp</label>

						<div class="input-group mb-3">

							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">62</span>
							</div>
							<input type="number" id="no_wa" class="form-control" placeholder="Masukan No Wa" name="no_wa">
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>


</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApWndLv05w_vXW-eIZWrsW65Ne-1WbtbY&libraries=places&v=weekly"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&libraries=places&v=weekly"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApWndLv05w_vXW-eIZWrsW65Ne-1WbtbY&libraries=places"></script> -->

<script>
	document.getElementById("myForm").addEventListener("keydown", function(e) {
		if (e.key === "Enter") {
			e.preventDefault(); // Mencegah tindakan default tombol "Enter"
		}
	});

	$("#no_wa").on("input", function() {
		if (/^0/.test(this.value)) {
			this.value = this.value.replace(/^0/, "")
		}
	})

	$('.select2').select2({
		// theme: 'bootstrap-5',
		ordering: false
	});
	$("select").on("select2:select", function(evt) {
		var element = evt.params.data.element;
		var $element = $(element);
		$element.detach();
		$(this).append($element);
		$(this).trigger("change");
	});


	var lp = false,
		titik_koordinat = false,
		kordinat_rumah = false
	pickKordinat()

	function pickKordinat(el) {
		// $('#modalPickKordinat').addClass("is-active is-animate show").modal("show")
		lp = new locationPicker('mapPicker', {
			setCurrentPosition: false,
		}, {
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.HYBRID,
		})

		$('<input/>')
			.prop('type', 'text')
			.prop('id', 'pac-input')
			.prop('placeholder', 'Cari nama tempat . .')
			.addClass('controls')
			.insertBefore($('#mapPicker'))
		const input = document.getElementById("pac-input");
		var map = lp.map
		const searchBox = new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		map.addListener("bounds_changed", () => {
			searchBox.setBounds(map.getBounds());
		});

		var inx = setInterval(function() {
			$('#pac-input').slideDown(1000)
			clearInterval(inx)
		}, 100)


		let markers = [];
		searchBox.addListener("places_changed", () => {
			const places = searchBox.getPlaces();
			if (places.length == 0) return false;
			markers.forEach((marker) => {
				marker.setMap(null);
			});
			markers = [];
			const bounds = new google.maps.LatLngBounds();

			places.forEach((place) => {
				if (!place.geometry || !place.geometry.location) {
					console.log("Returned place contains no geometry");
					return;
				}

				const icon = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25),
				};
				// Create a marker for each place.
				markers.push(
					new google.maps.Marker({
						map,
						icon,
						title: place.name,
						position: place.geometry.location,
					})
				);

				if (place.geometry.viewport) {
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(place.geometry.location);
				}
			});
			map.fitBounds(bounds);
		});

		$('#confirmPosition').click(function() {
			var location = lp.getMarkerPosition();
			getAddressFromLatLng(location.lat, location.lng);

			var location = lp.getMarkerPosition()
			var jarak = false
			var origin = {
				position: {
					lat: location.lat,
					lng: location.lng
				}
			}
			kordinat_rumah = origin

			if (titik_koordinat) {
				var destination = {
					position: {
						lat: parseFloat(titik_koordinat.latitude),
						lng: parseFloat(titik_koordinat.longitude)
					}
				}
				jarak = haversine_distance(kordinat_rumah, destination);

				function haversine_distance(mk1, mk2) {
					var R = 3958.8; // Radius of the Earth in miles
					var rlat1 = mk1.position.lat * (Math.PI / 180); // Convert degrees to radians
					var rlat2 = mk2.position.lat * (Math.PI / 180); // Convert degrees to radians
					var difflat = rlat2 - rlat1; // Radian difference (latitudes)
					var difflon = (mk2.position.lng - mk1.position.lng) * (Math.PI / 180); // Radian difference (longitudes)

					var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));
					return d;
				}

				jarak = jarak * 1.60934
				jarak = (jarak.toFixed(2))
			}

			$('#latitude').val(location.lat)
			$('#longitude').val(location.lng)
			$('#modalPickKordinat').remove("is-active is-animate show").modal("hide")
		})

	}

	// var location = lp.getMarkerPosition();
	// getAddressFromLatLng(location.lat, location.lng);


	function getAddressFromLatLng(lat, lng) {
		var geocoder = new google.maps.Geocoder();

		var latlng = {
			lat: parseFloat(lat),
			lng: parseFloat(lng)
		};

		geocoder.geocode({
			'location': latlng
		}, function(results, status) {
			if (status === 'OK') {
				if (results[0]) {
					var address = results[0].formatted_address;
					// Di sini, Anda dapat melakukan sesuatu dengan alamat, misalnya menampilkannya atau menyimpannya ke variabel.
					// console.log('Alamat lengkap:', address);
					$('#alamat_lengkap').val(address);

				} else {
					console.log('Tidak ada hasil yang ditemukan');
				}
			} else {
				console.log('Geocoder gagal: ' + status);
			}
		});
	}

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
	var no = 1;
	dataSerikat();


	function dataSerikat(nama_ananda = "", tahun_lahir = "", status_ananda = "", ) {
		var container_berkas = $('#dataSerikat');
		var text = '<div class="row mb-2" id="form' + no + '">' +
			'<div class="col-4" style="padding-right: 5px">' +
			'<div class="input-group">' +
			'<input type="text" class="form-control p-2" name="nama_ananda[' + no + ']" id="nama_ananda_' + no + '" placeholder="Nama Ananda" value="' + nama_ananda + '">' +
			'</div>' +
			'</div>' +
			'<div class="col-4" style="padding-left: 1px;padding-right:1px">' +
			'<div class="input-group">' +
			'<input type="year" class="form-control p-2" name="tahun_lahir_ananda[' + no + ']" id="tahun_lahir_ananda' + no + '" placeholder="Tahun Lahir Ananda" value="' + tahun_lahir + '">' +
			'</div>' +
			'</div>' +
			'<div class="col-4" style="padding-left: 1px;padding-right:1px">' +
			'<div class="input-group">' +
			'<select name="status_ananda[' + no + ']" id="status_ananda' + no + '" class="form-control">' +
			'<option value="">Pilih Status</option>' +
			'<option value="Belum Sekolah">Belum Sekolah</option>' +
			'<option value="PAUD/KB">PAUD/KB</option>' +
			'<option value="TK">TK</option>' +
			'<option value="SD">SD</option>' +
			'</select>' +
			'</div>' +
			'</div>' +

			'</div>' +
			'</div>';

		container_berkas.append(text);
		no = no + 1;

	}

	$("#btnTambah").click(function() {

		dataSerikat();

	});

	$('#btnKurang').click(function() {
		if (no > 1) {
			$('#form' + (no - 1)).remove();
			no--;
		}
	});
</script>

</html>