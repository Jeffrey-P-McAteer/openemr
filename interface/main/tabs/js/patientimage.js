// Copyright (C) 2017 Jeffrey McAteer <jeffrey.p.mcateer@gmail.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// Returns string pointing to patient profile picture
//function patient_picture() {
//	console.log("patient_picture running");
	//return "https://s3.amazonaws.com/37assets/svn/1065-IMG_2529.jpg";
//}

// Which are we using, snake or camel?

function setPatientImage(pid) {
	//console.log("setPatientImage running, pid="+pid);
	//$('#patient_profile_pic').attr('src', patient_picture());
	
	//ko.cleanNode(document.getElementById('patient_profile_pic'));
	//ko.applyBindings(patient_data_view_model);//, document.getElementById('patient_profile_pic').parentElement);
	
	// Dumb solution that doesn't hook into existing environment
	/*document.getElementById('patient_profile_pic').src = webroot_url + '/controller.php' +
             '?document&retrieve' +
             '&patient_id=' + pid +
             '&document_id=-1' +
             '&as_file=false' +
             '&original_file=true' +
             '&disable_exit=false' +
             '&show_original=true' +
             '&context=patient_picture';
            */
     document.getElementById('patient_profile_pic').src = patient_data_view_model(null,pid,pid,null).patient_picture() +
     													  "&cache_killer="+Math.random();
     // 100% certain I'm using this wrong.
}
