<?php

namespace wp;
use wp\Post;

    class Comment {

        function __construct($user, $comment, $_time) {
          $this->user = $user;
          $this->comment = $comment;
          $this->_time = $_time;
        }
    }


?>

