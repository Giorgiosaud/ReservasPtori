<script>
	$(document).ready(function () {
		$('#fecha2').datepicker({
			format: "DD, d MM , yyyy",
			autoclose: true,
			clearBtn: true,
			language: 'es',
			startDate: new Date(new Date().setDate((new Date()).getDate() + parseInt(window.minimoDiasAReservar))),
			altField: "#fecha",
			altFormat: "yy-mm-dd",
		}).on('changeDate', function (e) {
			$('#fecha').val((e.format(0, 'yyyy-mm-dd')));
		});
		$('#fecha2').datepicker('update', new Date($('#fecha').val()));
		$('#fechaPago').datepicker();
		$('select').select2();


	});
	$('#modificarPaseo').on('reset', function (e) {
		$('#fecha2').datepicker('update', new Date($('#fecha').val()));
	});

</script>