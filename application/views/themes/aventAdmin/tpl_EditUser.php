<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title></title>
</head>

<body>
  <h2 class="header blue lighter bigger">
    Edit Data
  </h2>
  <form method="POST" action="<?php echo base_url(); ?>Login/Updateuser">
    <input type="text" name="id" placeholder="Id" value="<?php echo $result_user[0]["id"] ?>" hidden/>
    <a>Username</a>
    <input type="text" name="user_name" class="form-control" placeholder="Username"
      value="<?php echo $result_user[0]["user_name"] ?>" />
    <a>Password</a>
    <input type="text" name="user_password" class="form-control" placeholder="Password"
      value="<?php echo $result_user[0]["user_password"] ?>" />
    <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
      <span class="bigger-110">Confirm</span>
    </button>
  </form>

</body>

</html>