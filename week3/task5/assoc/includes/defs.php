<?php
/* Functions for PM database example. */

/* Load sample data, an array of associative arrays. */
include "pms.php";

abstract class ErrorType {
    const notAnInteger = "Please enter a valid integer.";
    const noResults = "No results found.";
    const noQuery = "Please enter a search query.";
}

/* Search sample data for $name or $year or $state from form. */
function search($query) {
    global $pms;
    global $error;
    
    $results = array();
     if(!empty($query)) {
     	if (!is_numeric($query)) {
			foreach ($pms as $pm) {
			    if (stripos($pm['name'], $query) !== FALSE || 
					stripos($pm['state'], $query) !== FALSE) {
				$results[] = $pm;
			    }
			}
	    } else {
			if ($query != intval($query)) {
				$error = ErrorType::notAnInteger;
				return;
			} else {
				foreach ($pms as $pm) {
			    	if (stripos($pm['from'], $query) !== FALSE || 
			    		stripos($pm['to'], $query) !== FALSE) {
						$results[] = $pm;
			    	}
				}
			}
	    }
     	$pms = $results;
     	
     	if(count($pms) == 0) {
     		$error = ErrorType::noResults;
     	}
     } else {
     	$error = ErrorType::noQuery;
     }

    // Filter $pms by $name
 /*   if (!empty($name)) {
		$results = array();
		foreach ($pms as $pm) {
		    if (stripos($pm['name'], $name) !== FALSE) {
			$results[] = $pm;
		    }
		}
		$pms = $results;
    }
    
    // Filter $pms by $year
    if (!empty($year)) {
		$results = array();
		foreach ($pms as $pm) {
		    if (strpos($pm['from'], $year) !== FALSE || 
		        strpos($pm['to'], $year) !== FALSE) {
			$results[] = $pm;
		    }
		}
	$pms = $results;
    }

    // Filter $pms by $state
    if (!empty($state)) {
		$results = array();
		foreach ($pms as $pm) {
		    if (stripos($pm['state'], $state) !== FALSE) {
			$results[] = $pm;
		    }
		}
		$pms = $results;
    }*/
	}
?>
