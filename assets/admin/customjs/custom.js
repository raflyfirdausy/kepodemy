"use strict";

$('.filter-date').daterangepicker({
	buttonClasses: ' btn',
	applyClass: 'btn-primary',
	cancelClass: 'btn-secondary'
});

function getdate_onemonthlast(){
	var now = new Date();
	var current = new Date(now.setMonth(now.getMonth()));
	var prevMonthLastDate = new Date(now.setMonth(now.getMonth() - 1));
	var formatDateComponent = function(dateComponent) {
		return (dateComponent < 10 ? '0' : '') + dateComponent;
	};
	var formatDate = function(date) {
		return formatDateComponent(date.getMonth() + 1) + '/' + formatDateComponent(date.getDate()) + '/' + date.getFullYear();
	};
	var prevmonth = formatDate(prevMonthLastDate) + ' - ' + formatDate(current);
	return prevmonth;
}

$('.filter-date').val(getdate_onemonthlast());


$('.btn-lihat-password').on("click", function(){
	var type = $('.password').attr('type') == "text" ? "password" : 'text';
	$('.password').prop('type', type);
});

$(document).ready(function(){

	var arrows;
	arrows = {
		rightArrow: '<i class="la la-angle-right"></i>',
		leftArrow: '<i class="la la-angle-left"></i>'
	}

	$('.datepicker').datepicker({
		format: 'dd-mm-yyyy',
		// todayHighlight: true,
		orientation: "bottom left",
		templates: arrows,
		autoclose: true
	}).datepicker('setDate', 'today');

	$('.timepicker').timepicker({
		minuteStep: 5,
		showInputs: false,
		showSeconds: false,
		showMeridian: false,
	});

	$('.btn-icon-date').on("click", function(){
		$('.datepicker').datepicker('show');
	})

	$('.btn-icon-time').on("click", function(){
		$('.timepicker').timepicker().focus();
	})

	$('#select-kelas').select2({
		placeholder: "Pilih Kelas"
	});
	
	$('#select-kategori').select2({
		placeholder: "Pilih Kategori Pengajar"
	});
	
	$('#select-level').select2({
		placeholder: "Pilih Level"
	});
	
	$('#select-kelamin').select2({
		placeholder: "Pilih Jenis Kelamin"
	});

	$('#select-pengajar').select2({
		placeholder: "Pilih pengajar"
	});
	$('#select-jenis-kelas').select2({
		placeholder: "Pilih jenis pembelajaran"
	});
});


