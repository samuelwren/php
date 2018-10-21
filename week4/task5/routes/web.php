<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require(app_path().'/pms.php');  // The file containing the pms array is in the app directory. 
                                 // app_path() give us the path the the app directory

// To do: Display search form
Route::get('/', function() {
  // Remove the line below, and implement your own code.
	return view('pms/query');
});


// To do: Perform search and display results
Route::get('search', function() {
    $name = request('name');
    $year = request('year');
    $state = request('state');
    
    $results = search($name, $year, $state);
    
    return view('pms/result')->withPms($results)->with('name', $name)->with('year', $year)->with('state', $state);
});


/* Functions for PM database example. */

/* Search sample data for $name or $year or $state from form. */
function search($name, $year, $state) {
  $pms = getPms();

  // Filter $pms by $name
  if (!empty($name)) {
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
  }

  return $pms;
}

?>