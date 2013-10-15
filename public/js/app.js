// E-Vehicle Man js 
requirejs.config({
    enforceDefine: false,
    paths: {
        jquery: 'lib/jquery.min',
		 jquery_nicescroll: 'lib/plugins/nicescroll/jquery.nicescroll.min',
		 imagesloaded: 'lib/js/plugins/imagesLoaded/jquery.imagesloaded.min.js',
		 jquery_bootbox: 'lib/js/plugins/bootbox/jquery.bootbox.js',
		 jquery_form: 'lib/js/plugins/form/jquery.form.min.js',
		 jquery_validate: 'lib/plugins/validation/jquery.validate.min',
		 jquery_ui_core: 'lib/js/plugins/jquery-ui/jquery.ui.core.min.js',
		 jquery_ui_widget: 'lib/js/plugins/jquery-ui/jquery.ui.widget.min.js',
		 jquery_ui_mouse: 'lib/js/plugins/jquery-ui/jquery.ui.mouse.min.js',
		 jquery_ui_resizable: 'lib/js/plugins/jquery-ui/jquery.ui.resizable.min.js',
		 jquery_ui_sortable: 'lib/js/plugins/jquery-ui/jquery.ui.sortable.min.js',
		 jquery_slimscroll: 'lib/js/plugins/slimscroll/jquery.slimscroll.min.js',
		 additional_methods: 'lib/plugins/validation/additional-methods.min',
		 demonstration: 'lib/js/demonstration.min.js',
		 jquery_icheck: 'lib/plugins/icheck/jquery.icheck.min',
		 bootstrap: 'app/bootstrap.min',
		 eakroko: 'app/eakroko',
		 cssbootstrap: '/css/bootstrap.min.css',
		 cssbootstrap_responsive: '/css/bootstrap-responsive.min.css',
		 jquery_ui: '/css/plugins/jquery-ui/smoothness/jquery-ui.css',
		 jquery_ui_theme: '/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css',
		 cssicheckall: '/css/plugins/icheck/all.css',
		 cssstyle: '/css/style.css',
		 cssthemes: '/css/themes.css',
    },
	 shim: {
		'jquery_nicescroll' : {
			 deps: ['jquery'],
            exports: 'jquerynicescroll'
		},
		'jquery_validate': {
			 deps: ['jquery'],
            exports: 'jqueryvalidate'
		},
		'additional_methods': {
			 deps: ['jquery','jquery_validate'],
            exports: 'additionalmethods'
		},
		'jquery_icheck' : {
			 deps: ['jquery','jquery_nicescroll'],
            exports: 'jqueryicheck'
		},
		'bootstrap': {
            deps: ['jquery','jquery_icheck','jquery_nicescroll','jquery_validate','additional_methods'],
            exports: 'bootstrap'
        },	
		'eakroko': {
            deps: ['jquery','bootstrap','jquery_icheck','jquery_nicescroll','jquery_validate','additional_methods'],
            exports: 'eakroko'
        },	
	}
});

//Later
require(['css!cssbootstrap','css!cssbootstrap_responsive','css!cssicheckall','css!cssstyle','css!cssthemes','jquery','jquery_nicescroll','jquery_validate','additional_methods','jquery_icheck','bootstrap','eakroko'], function ($) {
}, function (err) {
    alert("System error! Please contact administrator");
});