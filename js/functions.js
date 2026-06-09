$(document).ready(function () {
	$("#sidebarCollapse").on("click", function () {
		$("#sidebar").toggleClass("active");
		$(".collapse").each(function () {
			$(this).collapse("hide");
		});
	});
});
$(".collapse").each(function () {
	$(this).on("show.bs.collapse", function () {
		console.log($(this));
		$("#sidebar").removeClass("active");
	});
});

var ctx = document.getElementById("myChart");
var ctx1 = document.getElementById("myChart1");
if ($('#myChart').length > 0 && $('#myChart1').length > 0) {
	var myChart = new Chart(ctx, {
		type: "bar",
		data: {
			labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			datasets: [
				{
					label: "# of Votes",
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						"rgba(255, 99, 132, 0.7)",
						"rgba(54, 162, 235, 0.7)",
						"rgba(255, 206, 86, 0.7)",
						"rgba(75, 192, 192, 0.7)",
						"rgba(153, 102, 255, 0.7)",
						"rgba(255, 159, 64, 0.7)",
					],
					borderColor: [
						"rgba(255, 99, 132, 1)",
						"rgba(54, 162, 235, 1)",
						"rgba(255, 206, 86, 1)",
						"rgba(75, 192, 192, 1)",
						"rgba(153, 102, 255, 1)",
						"rgba(255, 159, 64, 1)",
					],
					borderWidth: 1,
				},
			],
		},
		options: {
			scales: {
				yAxes: [
					{
						ticks: {
							beginAtZero: true,
						},
					},
				],
			},
		},
	});
	var myChart = new Chart(ctx, {
		type: "bar",
		data: {
			labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			datasets: [
				{
					label: "# of Votes",
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						"rgba(255, 99, 132, 0.7)",
						"rgba(54, 162, 235, 0.7)",
						"rgba(255, 206, 86, 0.7)",
						"rgba(75, 192, 192, 0.7)",
						"rgba(153, 102, 255, 0.7)",
						"rgba(255, 159, 64, 0.7)",
					],
					borderColor: [
						"rgba(255, 99, 132, 1)",
						"rgba(54, 162, 235, 1)",
						"rgba(255, 206, 86, 1)",
						"rgba(75, 192, 192, 1)",
						"rgba(153, 102, 255, 1)",
						"rgba(255, 159, 64, 1)",
					],
					borderWidth: 1,
				},
			],
		},
		options: {
			scales: {
				yAxes: [
					{
						ticks: {
							beginAtZero: true,
						},
					},
				],
			},
		},
	});
	var myChart = new Chart(ctx1, {
		type: "bar",
		data: {
			labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			datasets: [
				{
					label: "# of Votes",
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						"rgba(255, 99, 132, 0.7)",
						"rgba(54, 162, 235, 0.7)",
						"rgba(255, 206, 86, 0.7)",
						"rgba(75, 192, 192, 0.7)",
						"rgba(153, 102, 255, 0.7)",
						"rgba(255, 159, 64, 0.7)",
					],
					borderColor: [
						"rgba(255, 99, 132, 1)",
						"rgba(54, 162, 235, 1)",
						"rgba(255, 206, 86, 1)",
						"rgba(75, 192, 192, 1)",
						"rgba(153, 102, 255, 1)",
						"rgba(255, 159, 64, 1)",
					],
					borderWidth: 1,
				},
			],
		},
		options: {
			scales: {
				yAxes: [
					{
						ticks: {
							beginAtZero: true,
						},
					},
				],
			},
		},
	});
}
("use strict");
$(document).ready(function () {
	$("#d_week,#d_week1").datepicker({
		daysOfWeekDisabled: "2",
	});
});



//Select List action
