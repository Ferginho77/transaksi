<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>LOGIN</title>
</head>
<body>
<div class="wrapper">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Log in</div>
                     <form class="flip-card__form" action="controllers/user.php?aksi=login" method="post">
                        <input class="flip-card__input" name="Username" placeholder="Username">
                        <input class="flip-card__input" name="Password" placeholder="Password" type="password">
                        <button type="submit" name="login"  class="flip-card__btn">Let`s go!</button>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Sign up</div>
                     <form class="flip-card__form" action="" method="post">
                        <input class="flip-card__input" placeholder="Username" type="Username">
                        <input class="flip-card__input" placeholder="NamaLengkap" type="NamaLengkap">
                        <input class="flip-card__input" name="password" placeholder="Password" type="password">
                        <button type="submit" name="register" class="flip-card__btn">Confirm!</button>
                     </form>
                  </div>
               </div>
            </label>
        </div>   
   </div>
</body>
</html>