<?php
  $posts = array();
  $posts[0] = array(
    'user' => 'Obi-Won Kenobi',
    'message' => 'Hello There!',
    'image' => 'https://i.giphy.com/media/J3ixypdaocoRG/source.gif',
    'date' => '10:00am / 9-12-2017');
  $posts[1] = array(
    'user' => 'General Grevius',
    'message' => 'General Kenobi',
    'image' => 'https://media.giphy.com/media/l4FGm7iwh5wMzerXa/giphy.gif',
    'date' => '10:55am / 9-12-2017');
  $posts[2] = array(
    'user' => 'Captain Kurt',
    'message' => 'Ohh Fight!',
    'image' => 'https://media.giphy.com/media/WClVp8rnMThvi/giphy.gif',
    'date' => '10:59am / 9-12-2017');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <meta charset="utf-8">
    <title>2503ICT Web Programming</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
  </head>

  <body>
    <nav class="navbar bg-primary text-white">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand bg-primary text-white" href="#">Social Media</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="bg-primary text-white" href="#">Photos</a></li>
            <li><a class="bg-primary text-white" href="#">Friends</a></li>
            <li><a class="bg-primary text-white" href="#">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
    </nav>

      <div class="col-sm-3">
        <form>
          <fieldset>
            <legend><span>Name</span></legend>
            <label>
              <input type="text" class="form-control" name="name" placeholder="Insert Username Here!"/>
            </label>
          </fieldset>
          <fieldset>
            <legend><span>Message</span></legend>
            <label>
              <input type="text" class="form-control" name="message" placeholder="Insert Message Here!"/>
            </label>
          </fieldset>
          <br>
          <button class="btn btn-primary">Post</button>
        </form>
      </div>

      <div class="col-sm-3">
        <h3>firstName lastName</h3>
        <br>
        <br>
      </div>

      <div class="col-sm-8" >
        
        <?php foreach ($posts as $post) {?>

          <div class="card card-block">
            <?= $post['user'] ?> 
          <small class="col-sm-4 close"> <?= $post['date'] ?> </small>
          <h4 class="card-title"><img src="<?= $post['image'] ?>" width="175px" height="150px">
            <?= $post['message'] ?>
          </h4>
        </div>
        
        <?php } ?>
        
      </div>

  </body>
</html>
