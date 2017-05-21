<?php
/**
 * UserService
 *
 * Copyright (C) 2017 Jeffrey McAteer <jeffrey.p.mcateer@gmail.com>
 *
 * LICENSE: This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://opensource.org/licenses/gpl-license.php>;.
 *
 * @package OpenEMR
 * @author  Jeffrey McAteer <jeffrey.p.mcateer@gmail.com>
 * @link    http://www.open-emr.org
 */

namespace services;

class PatientInformationService {
	
	/**
     * Default constructor.
     */
    public function __construct() {
        
    }
	
	public static function getProfileImage() {
		// From interface/patient_file/summary/patient_picture.php
		$picture_directory = "Patient Photograph"; //change this if you want
	    $pics = array();
	    $sql_query = "select documents.id from documents join categories_to_documents on documents.id = categories_to_documents.document_id join categories on categories.id = categories_to_documents.category_id where categories.name like ? and documents.foreign_id = ?";
	    if ($query = sqlStatement($sql_query, array($picture_directory, $_SESSION['pid']) )) {
	      while( $results = sqlFetchArray($query) ) {
	        $tmp = $results['id'];
	        if (isset($tmp)) {
	        	// todo covnert $tmp to 'file:///var/www/html/sites/default/documents/1/snow.jpg', then parse out to URL '/sites/default/documents/1/snow.jpg'
	        	array_push($pics, $GLOBALS['webroot']."/controller.php?document&retrieve&patient_id=".htmlspecialchars($_SESSION['pid'],ENT_QUOTES)."&document_id=".htmlspecialchars($tmp,ENT_QUOTES)."&as_file=false'");
	        }
	      }
	    }
	    if (count($pics) < 1) {
	    	return "/public/images/def-profile.png";
	    }
	    else if (count($pics) == 1) {
	    	return strval($pics[0]);
	    }
	    // We have to choose? Should we query for a preferred pic? Choose randomly?
	    return strval($pics[0]);
 	}
	
}