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

/* This route is called when the web page is opened */
Route::get('/', function () {
    // SQL query 
    $sql = "SELECT * FROM Post ORDER BY id DESC";
    $posts = DB::SELECT($sql);
    
    // Fetches the page to first open with the $posts parameter
    return view('socialMedia.dashboard')->with('posts', $posts);
});


/* -- Post Routes -- */

/* Route is called after a person has clicked on the add post button */
Route::post('addPost_action', function () {
    // Varibles that the function retrieves 
    $title = request('title');
    $userName = request('userName');
    $message = request('message');
    
    // Passes the 3 varibles called and retreives the $id varibles
    $id =  add_post($title, $userName, $message);
    
    // If $id is true, return to home else display error message
    if ($id) {
        return redirect("/");
    } else {
        die('Error!');
    }
});

/* Route to Delete the Post */
Route::get('delete_post/{id}', function ($id) {
    // passes $id var into delete_post function
    delete_post($id);
    
    // Return home
    return redirect("/");
});

/* Route to Update the Post */
Route::get('edit_post/{id}', function ($id) {
    $post = get_post($id);
    return view('socialMedia/update_post')->with('post', $post);
});

/* Route is called after a person has clicked on the update button */
Route::post('editPost_action', function () {
    // Varibles that the function retrieves
    $id = request('id');
    $title = request('title');
    $userName = request('userName');
    $message = request('message');
    
    // Passes the 3 varibles called
    update_post($id, $title, $userName, $message);
    
    // If $id is true, Display the comment page of the post else display error message
    if ($id) {
        return redirect("comment/$id");
    } else {
        die('Error!');
    }
});


/* -- Comment Routes -- */

/* Redirects to the comment page of that post */
Route::get('comment/{id}', function ($id) {
    $post = get_post($id);
    $comments = get_comment($id);
    return view('socialMedia/comment')->with('post', $post)->with('comments', $comments);
});

/* Route is called after a person has clicked on the add comment button */
Route::post('addComment_action', function() {
   // Varibles that the function retrieves
   $id = request('id');
   $comment_userName = request('comment_userName');
   $comment = request('comment');
   
   // Passes the 3 varibles called
   add_comment($id, $comment_userName, $comment);
   
   // If $id is true, Display the comment page of the post else display error message
   if ($id) {
        return redirect(secure_url("comment/$id"));
    } else {
        die('Error!');
    }
});

/* Route to Delete the Comment */
Route::get('delete_comment/{id}/{commentID}', function ($id, $commentID) {
    // passes $commentID var into delete_post function
    delete_comment($commentID);
    
    // Return to the comment page of that post
    return redirect("comment/$id");
});

/* Route called to Show the about page */
Route::get('about', function () {
    return view("socialMedia/about");
});


/* -- Post Functions -- */

/* The Add Post function called in the route */
function add_post($title, $userName, $message) {
    // SQL Query 
    $sql = "INSERT INTO Post (title, userName, message) values (?, ?, ?)";
    
    // uses the sql INSERT function. selects the varible $sql And the placeholde equal to varibles in the array
    DB::insert($sql, array($title, $userName, $message));
    
    // $id is a new element. This finds the last inputted id varible.
    $id = DB::getPdo()->lastInsertId();
    
    // returns the $id back to the Route
    return ($id);
}

/* The Delete Post function called in the route */
function delete_post($id) {
    // SQL Query 
    $sql = "DELETE FROM Post 
                WHERE id = ?";
    
    // uses the sql DELETE function. selects the varible $sql And the placeholders equal to varibles in the array
    DB::delete($sql, array($id));
}

/* The Update Post function called in the route */
function update_post($id, $title, $userName, $message) {
    // SQL Query
    $sql = "UPDATE Post 
                SET title = ?, userName = ?, message = ? 
                    WHERE id = ?";
    
    // uses the sql UPDATE function. selects the varible $sql And the placeholders equal to varibles in the array
    DB::update($sql, array($title, $userName, $message, $id));
}

/* A function that retreives the posts */
function get_post($id) {
    // SQL Query
    $sql = "SELECT * FROM Post 
                WHERE id = ?";
    
    // uses the sql SELECT function. selects the varible $sql And the placeholders equal to varibles in the array
    $posts = DB::SELECT($sql, array($id));
    
    // An if state if there is an error
    if (count($posts) != 1) {
        die("You suck! fix it! $sql");
    }
    
    $post = $posts[0];
    
    // Return $post back to the Route
    return $post;
}


/* -- Comment Functions -- */

/* The Adds Comment function called in the route */
function add_comment($id, $comment_userName, $comment) {
    // SQL Query
    $sql = "INSERT INTO Comment (postID, comment_userName, comment) values (?, ?, ?)";
    
    // uses the sql INSERT function. selects the varible $sql And the placeholders equal to varibles in the array
    DB::insert($sql, array($id, $comment_userName, $comment));
}

/* The Adds Comment function called in the route */
function delete_comment($commentID) {
    // SQL Query
    $sql = "DELETE FROM Comment 
                WHERE commentID = ? ";
    
    // uses the sql DELETE function. selects the varible $sql And the placeholders equal to varibles in the array
    DB::delete($sql, array($commentID));
}

/* A function that retreives the comments */
function get_comment($id) {
    // SQL Query
    $sql = "SELECT * FROM Comment 
                WHERE postID = ?";
    
    // uses the sql SELECT function. selects the varible $sql And the placeholders equal to varibles in the array
    $comments = DB::SELECT($sql, array($id));

    // Returns varible $comments to the Route
    return $comments;
}



