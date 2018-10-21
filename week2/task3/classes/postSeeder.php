<?php

  //references location of fetching elements
  namespace wp;
  use wp\Post;
  
  // references the post.php file
  include_once 'post.php';
  
  // a class that stores info to be generated into a post
  class PostSeeder {
    public static function seed() {
      $posts =[];
      $post = new Post("Obi-Won Kenobi", "Hello There!", "https://i.giphy.com/media/J3ixypdaocoRG/source.gif", "10:00am / 9-12-2017");
      $post->addComment("Bob","TEST");
      $post->addComment("Rick","Lick, Lick My Balls", "10:30pm");
      $posts[] = $post; 
      $posts[] = new Post("General Grevius", "General Kenobi", "https://media.giphy.com/media/l4FGm7iwh5wMzerXa/giphy.gif", "10:55am / 9-12-2017");
      $posts[] = new Post("Captain Kurt", "Ohh Fight!", "https://media.giphy.com/media/WClVp8rnMThvi/giphy.gif", "10:59am / 9-12-2017");

      return $posts;
    }
  }

?>
