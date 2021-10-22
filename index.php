<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="[no-cache]">
    <title>Тестовое</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    
<header class="header">
 <div class="mycontainer">
   <div class="header__logo">
    <div class="logo"><img src="img/logo.png" alt=""></div>

   </div>
   <div class="header__form">
      <div class="header__icon"><img src="img/email.png" alt=""></div>
      <form class="form row" novalidate>
        <div class="form__left col-12 col-lg-5">
          <div class="form-group">
            <div class="label"><label for="name">Имя <span>*</span></label></div>
            <input type="name" class="form-control" id="name" aria-describedby="nameHelp" required>
          </div>
  
          <div class="form-group">
            <div class="label"> <label for="email">E-Mail <span>*</span></label></div>
            <input type="email" class="form-control" id="email" required>
          </div>
        </div>

        <div class="form__right offset-lg-1 col-12 col-lg-6">
          <div class="form-group">
            <div class="label"><label for="textarea">Комментарий</label></div>
            <textarea class="form-control" id="textarea" rows="3"></textarea>
          </div>
        </div>
        <div class="form__button col-12">
          <button type="submit" class="btn sendemail">
            <span>Записать</span> 
          </button>
        </div>
     </form>

   </div>
 </div>
</header>



<section class="info">
  <div class="mycontainer">
  <div class="info__elements row">
<?php    

  $conn = new mysqli("localhost", "root", "root");
  $conn->query("USE ajax1");
  $get_info = "SELECT * FROM Users";
  $result= $conn->query($get_info);

  foreach($result as $row){

        ?>

          <div class="col-12 col-lg-4">
            <div class="card">
              <div class="card__header center">
                <span><?php echo $row["name"]; ?></span>
              </div>
              <div class="card__body">
                <span><?php echo  $row["email"]; ?></span>
                <p><?php echo $row["message"];  ?></p>
              </div>
            </div>
          </div>


  <?php     
  
   } 
   mysqli_free_result($result);
   $conn->close();
  ?>

  </div>
</div>
</section>

    <footer class="d-flex">
      <div class="mycontainer">
        <div class="footer row">
          <div class="footer__logo col-6 col-lg-3">
            <div class="logo"><img src="img/logo.png" alt=""></div>
          </div>
          <div class="footer__icons col-5 col-lg-2">
            <a href="" class="vk"></a>
            <a href="" class="fb"></a>
          </div>
        </div>
      </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"> </script>
    <script src="js/scripts.js"></script>
  </body>
</html>
