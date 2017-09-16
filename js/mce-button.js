( function( $ ) {

	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'PI Shortcode',
			icon: 'my-mce-icon',
			type: 'menubutton',
			menu: [
				{
					text: 'Services',
					icon: 'my-mce-icon',
					onclick: function() {
						editor.insertContent('[services_section]');
					}
				},
				{
					text: 'Portfolio',
					icon: 'my-mce-icon',
					onclick: function() {
						editor.insertContent('[portfolio_section]');
					}
				},
				{
					text: 'Testimonial',
					icon: 'my-mce-icon',
					onclick: function() {
						editor.insertContent('[testimonial_section]');
					}
				},
				{
					text: 'Pricing',
					icon: 'my-mce-icon',
					onclick: function() {
						editor.insertContent('[pricing_section]');
					}
				},
				{
					text: 'Blog',
					icon: 'my-mce-icon',
					onclick: function() {
						editor.insertContent('[blog_section]');
					}
				},
				{
					text: 'Partner',
					icon: 'my-mce-icon',
					onclick: function() {
						editor.insertContent('[partner_slider]');
					}
				},

			]
		});
	});


} )( jQuery );
