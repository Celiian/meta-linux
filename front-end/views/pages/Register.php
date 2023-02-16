<?php
$title = "Register";
ob_start() ?>
<?php if (isset($_SESSION['connect']) == true) {
   header('Location: /index.php?name=Home');
} ?>
<!-- OVERLAY -->
<div class="backform"></div>
<!-- WRAPPER REGISTER -->
<div class="wrap--form" style="margin-top: 40px">
   <form enctype="multipart/form-data" class="form--register" id="form" method="post" action="/front-end/actions/RegisterAction.php">
      <div class="close-form">
         <a href="/index.php?name=Home">&times;</a>

      </div>
      <div class="header-from">
         <p><?= $enJson['form']['register']['titleRegister'] ?></p>
         <?php if (isset($_SESSION['signup_error'])) { ?>
            <div class="error--warning">
               <?= $_SESSION['signup_error'] ?>
            </div>
         <?php
            unset($_SESSION['signup_error']);
         }
         ?>
         <div class="custom-file">
            <label for="avatar" class="label-file"><?= $enJson['form']['register']['labelProfile'] ?></label>
            <input accept="image/png, image/jpeg" type="file" name="avatar" id="avatar" class="input-file" value="">
            <img id="previewProfile" class="" src="/front-end/assets/img/default-user-img.jpeg">
         </div>
      </div>
      <div class="wrapper-part">
         <div class="wrap--input">
            <label for="username"><?= $enJson['form']['register']['labelPseudo'] ?></label>
            <input name="username" class="input--register" type="text" placeholder="<?= $enJson['form']['register']['placeholderPseudo'] ?>" id="username" />
         </div>
         <div class="wrap--input">
            <label for="dateofbirthday"><?= $enJson['form']['register']['labelBirthday'] ?></label>
            <input name="dateBirth" class="input--register" type="date" id="dateofbirthday" />
         </div>
         <div class="wrap--input">
            <label for="email"><?= $enJson['form']['register']['labelAdress'] ?></label>
            <input name="email" class="input--register" type="email" placeholder="<?= $enJson['form']['register']['placeholderAdress'] ?>" id="email" />
         </div>
         <div class="wrap--input">
            <label for="password"><?= $enJson['form']['register']['labelPassword'] ?></label>
            <input name="password" class="input--register" type="password" placeholder="<?= $enJson['form']['register']['placeholderPassword'] ?>" id="password" />
         </div>
      </div>
      <div>
         <button class="btn--register" id="connexion"><?= $enJson['form']['register']['buttonRegister'] ?></button>
         <div class="backtoback">
            <a href="index.php?name=Login"><?= $enJson['form']['register']['buttonToLogin'] ?></a>
         </div>
      </div>
   </form>
</div>
<script>
   //TOASTR JS 
   $(function(){
        <?php
        if(isset($_SESSION['toastr']))
        {
            echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
            unset($_SESSION['toastr']);
        }
        ?>          
    });
   //GET INPUT DATA 
   var data = [];
   data.push(document.getElementById('username'));
   data.push(document.getElementById('password'));
   data.push(document.getElementById('email'));
   data.push(document.getElementById('dateofbirthday'));

    //PREWIEW FOR THE PROFIL PICTURE
   $('input[type="file"]').on('change', (e) => {
      let that = e.currentTarget
      if (that.files && that.files[0]) {
         let reader = new FileReader()
         reader.onload = (e) => {
            $('#previewProfile').attr('src', e.target.result)
         }
         reader.readAsDataURL(that.files[0])
      }
   })
   // KEYUP FOR INPUT CHANGE
   form.addEventListener("keyup", function(e) {
      for (var i in data) {

         if (data[i].value != 0) {
            data[i].classList.remove("show-error-connection");
         }
      }
   });
   //CHECK IF ALL INPUT HAVE VALUE (ELSE STOP THE RESQUEST AND MSG ERROR)
   form.onsubmit = (e) => {
      for (var i in data) {
         if (data[i].value == 0) {
            e.preventDefault();
            data[i].placeholder = ('Put your ' + data[i].id);
            data[i].classList.add("show-error-connection");
            i = false;
         }

      }
      if (i == false){
         $(function() {
             toastr.error('<?= $enJson['form']['error']['signup'] ?>', '');
          });
       }
      
     
   }
</script>
<?php $pageName = ob_get_clean();
