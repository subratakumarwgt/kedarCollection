"use strict";
function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if ($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({ scrollTop: scroll_to }, 0);
	}
}
function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if (direction == 'right') {
		new_value = now_value + (100 / number_of_steps);
	}
	else if (direction == 'left') {
		new_value = now_value - (100 / number_of_steps);
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}
(function ($) {
	"use strict";
	$.backstretch;
	$('#top-navbar-1').on('shown.bs.collapse', function () {
		$.backstretch("resize");
	});
	$('#top-navbar-1').on('hidden.bs.collapse', function () {
		$.backstretch("resize");
	});
	$('.f1 fieldset:first').fadeIn('slow');

	$('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function () {
		$(this).removeClass('input-error');
	});
	$('.f1 .btn-next').on('click', function () {
		var parent_fieldset = $(this).parents('fieldset');
		var next_step = true;
		var current_active_step = $(this).parents('.f1').find('.f1-step.active');
		var progress_line = $(this).parents('.f1').find('.f1-progress-line');
		parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function () {
			if ($(this).val() == "") {
				$(this).addClass('input-error');
				next_step = false;
			}
			else {
				$(this).removeClass('input-error');
			}
		});
		if (next_step) {
			parent_fieldset.fadeOut(400, function () {
				current_active_step.removeClass('active').addClass('activated').next().addClass('active');
				bar_progress(progress_line, 'right');
				$(this).next().fadeIn();
				scroll_to_class($('.f1'), 20);
			});
		}
	});
	$('.f1 .btn-previous').on('click', function () {
		var current_active_step = $(this).parents('.f1').find('.f1-step.active');
		var progress_line = $(this).parents('.f1').find('.f1-progress-line');
		$(this).parents('fieldset').fadeOut(400, function () {
			current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
			bar_progress(progress_line, 'left');
			$(this).prev().fadeIn();
			scroll_to_class($('.f1'), 20);
		});
	});
	$('.f1').on('submit', function (e) {
		$(this).find('input[type="text"]').each(function () {
			if ($(this).val() == "") {
				e.preventDefault();
				window.isValid = false;
				$(this).addClass('input-error');
			}
			else {
				window.isValid = true;
				$(this).removeClass('input-error');
				loadoverlay($("#doctor_form"))
				e.preventDefault();
			}
		});
		if (window.isValid) {


			var form = new FormData();
			var files = $('#image')[0].files;
			if (files.length > 0) {
				form.append("image", files[0]);
				form.append("table_name", "doctors");
				form.append("table_model", "Doctor");
				form.append("folder_name", "doctorimage");

				var settings = {
					"url": "/api/upload-image",
					"method": "POST",
					"timeout": 0,
					"processData": false,
					"mimeType": "multipart/form-data",
					"contentType": false,
					"data": form,

					statusCode: {
						400: function () {
							hideoverlay($("#doctor_form"))
							// response = JSON.parse(response);
							$.notify({
								message: "Please upload valid image file"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							});
						},
						500: function () {
							hideoverlay($("#doctor_form"))
							//	response = JSON.parse(response);
							$.notify({
								message: "Something went wrong!"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							})
						}
					}
				};

				$.ajax(settings).done(function (response) {
					var json_response = JSON.parse(response);
					var img_path = json_response.data;
					$.notify({
						message: json_response.message
					}, {
						type: 'success',
						z_index: 10000,
						timer: 2000,
					})
					var form = new FormData();
					form.append("table_name", "doctors");
					form.append("name", $("#name").val());
					form.append("centre_id_json", JSON.stringify($("#centre_id_json").val()));
					form.append("gender", $("#gender").val());
					form.append("specialist", $("#specialist").val());
					form.append("image", img_path);
					form.append("medical_history", $("#medical_history").val());
					form.append("degree_json", JSON.stringify($("#degree_json").val()));
					form.append("experience", $("#experience").val());
					form.append("full_charge", $("#full_charge").val());
					form.append("booking_charge", $("#booking_charge").val());
					form.append("visit_frequency", $("#visit_frequency").val());
					form.append("table_model", "Doctor");

					var settings = {
						"url": "/api/create-data",
						"method": "POST",
						"timeout": 0,
						"processData": false,
						"mimeType": "multipart/form-data",
						"contentType": false,
						"data": form,
						statusCode: {
							400: function () {
								hideoverlay($("#doctor_form"))
								//  = JSON.parse();
								$.notify({
									message: "Something went wrong while inserting doctor!"
								}, {
									type: 'danger',
									z_index: 10000,
									timer: 2000,
								});
							},
							500: function () {
								hideoverlay($("#doctor_form"))
								// response = JSON.parse(response);
								$.notify({
									message: "Something went wrong while inserting doctor!"
								}, {
									type: 'danger',
									z_index: 10000,
									timer: 2000,
								})
							}
						}
					};

					$.ajax(settings).done(function (response) {
						var response2 = JSON.parse(response)

						$.notify({
							message: response2.message
						}, {
							type: 'success',
							z_index: 10000,
							timer: 2000,
						})

						var form = new FormData();
						form.append("table_name", "visits");
						form.append("doctor_id", response2.data.id);
						form.append("frequency", $("#visit_frequency").val());
						form.append("count", $("#count").val());
						form.append("type", $("#type").val());
						form.append("week_no", $("#week_no").val());
						form.append("week_days", JSON.stringify($("#week_days").val()));
						form.append("dates", JSON.stringify($("#dates").val()));
						form.append("days", JSON.stringify($("#days").val()));
						form.append("others_json", JSON.stringify({ "from_time": $("#from_time").val(), "to_time": $("#to_time").val() }));
						form.append("table_model", "Visits");

						var settings = {
							"url": "/api/create-data",
							"method": "POST",
							"timeout": 0,
							"processData": false,
							"mimeType": "multipart/form-data",
							"contentType": false,
							"data": form,
							statusCode: {
								400: function () {
									hideoverlay($("#doctor_form"))
									// response = JSON.parse(res);
									$.notify({
										message: "Something went wrong while inserting visit information."
									}, {
										type: 'danger',
										z_index: 10000,
										timer: 2000,
									});
								},
								500: function () {
									hideoverlay($("#doctor_form"))
									// response = JSON.parse(res);
									$.notify({
										message: "Something went wrong while inserting visit information."
									}, {
										type: 'danger',
										z_index: 10000,
										timer: 2000,
									})
								}
							}
						};

						$.ajax(settings).done(function (response) {
							var response3 = JSON.parse(response)
							hideoverlay($("#doctor_form"));
							$.notify({
								message: response3.message
							}, {
								type: 'success',
								z_index: 10000,
								timer: 2000,
							})
						});


					});




				});
			}
			else {
				hideoverlay($("#doctor_form"));
				$.notify({
					message: "Please select valid image"
				}, {
					type: 'danger',
					z_index: 10000,
					timer: 2000,
				})
			}
		}

	});

})(jQuery);