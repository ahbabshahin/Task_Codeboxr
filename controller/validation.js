jQuery('#create').validate({
	rules: {
		title: {
			required: true,
			minlength: 2,
			maxlength: 255,
			regularExpression: '/^[a-zA-Z0-9]/',
		},
		content: {
			required: true,
			minlength: 3,
			maxlength: 1000,
		},
	},
	messages: {
		// title: 'Please enter title.',
	},
});
