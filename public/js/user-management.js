var UserManagementModel = function( username ) {
   var self = this;

   self.details = ko.observableArray();
   self.list = ko.observable( );

	$.getJSON("/v1/user/getInfo?username=" + username, function(data){
		
		self.list( data['content'].skills.split( "," ) );
		self.details( data );

	}).fail(function(jqXHR,textStatus,errorThrown){
		console.error(textStatus);
		console.error(errorThrown);
	});


}
