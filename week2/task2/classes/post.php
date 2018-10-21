<?php

namespace wp;

  class Post {
    
    //variables
    protected $user;
    protected $message;
    protected $comments;

    // A reference for variables
    function __construct ($user, $message, $image, $timeDate) {
      $this->user = $user;
      $this->message = $message;
      $this->image = $image;
      $this->timeDate = $timeDate;
      $this->comments = array();
    }

    // allows access to the variable user
    function getUser() {
      return $this->user;
    }

    // allows access to the variable message
    function getMessage() {
      return $this->message;
    }
    
    // allows access to the variable image
    function getImage() {
      return $this->image;
    }
    
    // allows access to the variable time & Date
    function getTimeDate() {
      return $this->timeDate;
    }

    // allows access to the variable comments
    function getComments(){
      return $this->comments;
    }

    function addComment($user, $comment){
      $this->comments[] = array('user' => $user, 'comment' => $comment);
    }
  }

?>
