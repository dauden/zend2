// E-Vehicle Man js 
requirejs.config({
    enforceDefine: false,
    paths: {
        jquery: 'lib/jquery.min',
		 jquery_nicescroll: 'lib/plugins/nicescroll/jquery.nicescroll.min',
		 jquery_validate: 'lib/plugins/validation/jquery.validate.min',
		 additional_methods: 'lib/plugins/validation/additional-methods.min',
		 jquery_icheck: 'lib/plugins/icheck/jquery.icheck.min',
		 bootstrap: 'app/bootstrap.min',
		 eakroko: 'app/eakroko',
		 cssbootstrap: '/css/bootstrap.min.css',
		 cssbootstrap_responsive: '/css/bootstrap-responsive.min.css',
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