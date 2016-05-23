$(document).ready(function() {
	$('input[name="tenants"]').tagsinput({
		itemValue: 'id',
		itemText: 'name_email',
		typeahead: {
			source: function(query) {
				return $.get('/users/tenants/' + query);
			},
			afterSelect: function() {
				this.$element[0].value = '';
			},
		}
	});
});