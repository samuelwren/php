<?php
/* Posts for Social Media */
function getPost() {
    $posts = array(
                array(  'user' => 'Obi-Won Kenobi', 
                        'message' => 'Hello There!',
                        'image' => 'https://i.giphy.com/media/J3ixypdaocoRG/source.gif',
                        'timeDate' => '10:00am / 9-12-2017'
                ),
                array(  'user' => 'General Grevius', 
                        'message' => 'General Kenobi',
                        'image' => 'https://media.giphy.com/media/l4FGm7iwh5wMzerXa/giphy.gif',
                        'timeDate' => '10:55am / 9-12-2017'
                ),
                array(  'user' => 'Captain Kurt', 
                        'message' => 'Ohh Fight!',
                        'image' => 'https://media.giphy.com/media/WClVp8rnMThvi/giphy.gif',
                        'timeDate' => '10:59am / 9-12-2017'
                )
   );
  return $posts;
}
?>