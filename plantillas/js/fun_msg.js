/**
 * Bootstrap notify
 * helpful functions to call
 */

/**
 * [successAlert]
 * @param  {[string]} message [whatever message]
 */
function mensaje(message, tipo, icono, titulo, url) {
	$.notify({
		// options
		icon: icono,
		title: titulo,
		message: message,
		url: url,
		target: '_blank'
	},{
		// settings
		element: 'body',
		position: null,
		type: tipo,
		allow_dismiss: true,
		newest_on_top: false,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "right"
		},
		offset: {
			x: 10,
			y: 60
		},
		spacing: 10,
		z_index: 1031,
		delay: 5000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
		template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
			'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
			'<span data-notify="icon"></span> ' +
			'<span data-notify="title">{1}</span> ' +
			'<span data-notify="message">{2}</span>' +
			'<div class="progress" data-notify="progressbar">' +
				'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
			'</div>' +
			'<a href="{3}" target="{4}" data-notify="url"></a>' +
		'</div>' 
	});
}

function errorInicioSesion(message) {
	$.notify({
		// options
		icon: 'glyphicon glyphicon-warning-sign',
		title: 'Error: ',
		message: message,
		url: 'https://github.com/mouse0270/bootstrap-notify',
		target: '_blank'
	},{
		// settings
		element: 'body',
		position: null,
		type: "danger",
		allow_dismiss: true,
		newest_on_top: false,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "right"
		},
		offset: {
			x: 10,
			y: 60
		},
		spacing: 10,
		z_index: 1031,
		delay: 5000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
		template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
			'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
			'<span data-notify="icon"></span> ' +
			'<span data-notify="title">{1}</span> ' +
			'<span data-notify="message">{2}</span>' +
			'<div class="progress" data-notify="progressbar">' +
				'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
			'</div>' +
			'<a href="{3}" target="{4}" data-notify="url"></a>' +
		'</div>' 
	});
}

function successAlert(message) {
    $.notify({
            icon: 'fa fa-check fa-4x',
            title: 'Valide ;)',
        message: message
    },{
        type: 'minimalist',
        delay: 5000,
        animate: {
            enter: 'animated zoomInDown',
            exit: 'animated zoomOutUp'
        },
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<i data-notify="icon" class="pull-left"></i>' +
        '<span data-notify="titleValid">{1}</span>' +
        '<span data-notify="message">{2}</span>' +
        '</div>'
    });
}

/**
 * [warningAlert]
 * @param  {[string]} message [whatever message]
 */
function warningAlert(message) {
    $.notify({
        icon: 'fa fa-warning fa-4x',
        title: 'Erreur ;(',
        message: message
    },{
        type: 'minimalist',
        delay: 5000,
        animate: {
            enter: 'animated zoomInDown',
            exit: 'animated zoomOutUp'
        },
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<i data-notify="icon" class="pull-left"></i>' +
        '<span data-notify="title">{1}</span>' +
        '<span data-notify="message">{2}</span>' +
        '</div>'
    });
}

/**
 * [dangerAlert]
 * @param  {[string]} message [whatever message]
 */
function dangerAlert(message) {
    $.notify({
        icon: 'fa fa-close fa-4x',
        title: 'Erreur ;(',
        message: message
    },{
        type: 'minimalist',
        delay: 5000,
        animate: {
            enter: 'animated zoomInDown',
            exit: 'animated zoomOutUp'
        },
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<i data-notify="icon" class="pull-left"></i>' +
        '<span data-notify="title">{1}</span>' +
        '<span data-notify="message">{2}</span>' +
        '</div>'
    });
}