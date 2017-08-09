// Copyright (C) 2017 Jeffrey McAteer <jeffrey.p.mcateer@gmail.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

function setPatientImage() {
    $('#patient_profile_pic').attr('src', app_view_model.application_data.patient().patient_picture()+"&cache_killer="+Math.random());
}
