(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: '',
			icon: 'wa-homepage',
			type: 'menubutton',
			menu: [
						{
						text: 'Add single Youtube video',
						onclick: function() {
							editor.windowManager.open( {
							title: 'Insert Youtube video',
							body: [
								{
									type: 'textbox',
									name: 'youID',
									label: 'Entry Youtube video id here.',
									value: 'Past your id'
								},
								{
									type: 'textbox',
									name: 'youcaption',
									label: 'Entry Youtube lightbox caption.',
									value: 'Simple youtube video'
								},
								{
									type: 'textbox',
									name: 'youwidth',
									label: 'Entry Youtube video width.',
									value: '500'
								},
								{
									type: 'textbox',
									name: 'youheight',
									label: 'Entry Youtube video height.',
									value: '300'
								},
								
									],
									onsubmit: function( e ) {
										editor.insertContent( '[gbox_youtube id="' + e.data.youID + '" caption="' + e.data.youcaption + '" width="' + e.data.youwidth + '" height="' + e.data.youheight + '"]');
									}
								});
							}
						},
						{
						text: 'Add single Vimeo video',
						onclick: function() {
							editor.windowManager.open( {
							title: 'Insert Vimeo video',
							body: [
								{
									type: 'textbox',
									name: 'vimeoID',
									label: 'Entry Vimeo video id here.',
									value: 'Past your id'
								},
								{
									type: 'textbox',
									name: 'vimeocaption',
									label: 'Entry Vimeo lightbox caption.',
									value: 'Simple Vimeo video'
								},
								{
									type: 'textbox',
									name: 'vimeowidth',
									label: 'Entry Vimeo video width.',
									value: '500'
								},
								{
									type: 'textbox',
									name: 'vimeoheight',
									label: 'Entry Vimeo video height.',
									value: '300'
								},
								
									],
									onsubmit: function( e ) {
										editor.insertContent( '[gbox_vimeo id="'+ e.data.vimeoID +'" caption="'+ e.data.vimeocaption +'" width="'+ e.data.vimeowidth +'" height="'+ e.data.vimeoheight +'"]');
									}
								});
							}
						},
						
			]
		});
	});
})();
