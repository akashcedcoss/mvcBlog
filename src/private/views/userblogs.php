<?php
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home</a>
      <a class="nav-item nav-link" href="logout">Logout</a>
      <a class="nav-item nav-link" href="#">Dashboard</a>
      <!-- <a class="nav-item nav-link disabled" href="#"></a> -->
    </div>
  </div>
</nav>




<?php foreach($data as $tal){
// echo $tal->user_id;

  ?>
<div class="container">
<form action="blogedit" method="POST">
<div class="card mt-5 " style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $tal->post_id; ?></h5>
    <h5 class="card-title"><?php echo $tal->title; ?></h5>
    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <p class="card-text"><?php echo $tal->content; ?>.</p>


    
          <input type="hidden" name="idd"   value="<?php echo $tal->post_id ; ?>" class="btn btn-success">
          <?php if($tal->user_id == $_SESSION['login']['user_id']) { ?>
          <input type="submit" name="submit" id="submit"  value="edit"  class="btn btn-dark">
        


  </div>
</div>
          </form>
</div>
    
<?php }} ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>