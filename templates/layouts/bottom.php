<footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Z-Techno
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                Copyright &copy; 2021, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">Z-Techno</a>
            </div>				
        </div>
    </footer>
</div>
<!-- End Custom template -->
</div>
	<!--   Core JS Files   -->
	<script src="<?=asset('assets/js/core/jquery.3.2.1.min.js')?>"></script>
	<script src="<?=asset('assets/js/core/popper.min.js')?>"></script>
	<script src="<?=asset('assets/js/core/bootstrap.min.js')?>"></script>

	<!-- jQuery UI -->
	<script src="<?=asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?=asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')?>"></script>


	<!-- Chart JS -->
	<script src="<?=asset('assets/js/plugin/chart.js/chart.min.js')?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?=asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')?>"></script>

	<!-- Chart Circle -->
	<script src="<?=asset('assets/js/plugin/chart-circle/circles.min.js')?>"></script>

	<!-- Datatables -->
	<script src="<?=asset('assets/js/plugin/datatables/datatables.min.js')?>"></script>

	<!-- Bootstrap Notify -->
	<script src="<?=asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')?>"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?=asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')?>"></script>

	<!-- Sweet Alert -->
	<script src="<?=asset('assets/js/plugin/sweetalert/sweetalert.min.js')?>"></script>

	<!-- Atlantis JS -->
	<script src="<?=asset('assets/js/atlantis.min.js')?>"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?=asset('assets/js/setting-demo.js')?>"></script>
	<script src="<?=asset('assets/js/demo.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/datatables-pagingtype/full_numbers_no_ellipses.js')?>"></script>
	
	<script>
		$('.datatable-crud').dataTable({
			stateSave:true,
			pagingType: 'full_numbers_no_ellipses',
			processing: true,
			search: {
				return: true
			},
			serverSide: true,
			ajax: location.href
		})
		$('.datatable').dataTable();
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>
