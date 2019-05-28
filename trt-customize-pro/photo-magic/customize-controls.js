( function( api ) {

	// Extends our custom "photo-magic" section.
	api.sectionConstructor['photo-magic'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
