<?php

// echo "<pre>";
// print_r($data);
// echo "</pre>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">User Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data as $key => $val) { ?>
    <tr>
      <th scope="row">
          <?php echo  $val->user_id ; ?>
        </th>
            <td><?php echo $val->username; ?></td>
            <td><?php echo $val->email; ?></td>
            <td><?php echo $val->password; ?></td>
            <td><?php echo $val->role; ?></td>
            <td><?php echo $val->status; ?></td>
      <td>
        <form action="user_authenticate" method="POST">
          <input type="submit" name="submit" id="submit"  value="approved" class="btn btn-success">
          <input type="hidden" name="idd"   value="<?php echo $val->user_id ; ?>" class="btn btn-success">
          <input type="submit" name="submit" id="submit"  value="restricted"  class="btn btn-danger">
          <input type="submit" name="submit" id="submit"  value="delete"  class="btn btn-dark">
        </form>

      </td>
    </tr>
    <?php  } ?>
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>