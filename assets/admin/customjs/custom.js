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
