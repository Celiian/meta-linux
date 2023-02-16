<button class="btnprofile" onclick="document.getElementById('update--form').style.display='block';"><?=$enJson['profile']['button']['buttonUser']?></button>

<div id="update--form" class="modal" <?php if(isset($_SESSION['processUser'])){if($_SESSION['processUser'] == true) echo 'style = "display : block";';} ?>>
   <form class="modal-content" enctype="multipart/form-dataUser" id="formUpdateUser" method="post" action="/front-end/actions/UpdateInfoUser.php">
      <div class="close-form">
         <a onclick="document.getElementById('update--form').style.display='none' <?php $_SESSION['processUser'] = false ;?>" class="close" title="Close Modal">&times;</a>
      </div>
      <div class="wrapper-part-profile">
         <h3><?=$enJson['profile']['profilModal']['title']?><h3>
               <div>
                  <label class="label-form" for="username"><?= $enJson['form']['register']['labelPseudo']?></label>
                  <input id="new-username" name="username" class="input--register" type="text" value="<?= $_SESSION['user']['username'] ?>" />
               </div>

               <div>
                  <label class="label-form" for="email"><?= $enJson['form']['register']['labelAdress'] ?></label>
                  <input id="new-email" name="email" class="input--register" type="text" value="<?= $_SESSION['user']['email'] ?>" placeholder="New email" />
               </div>

               <div>
                  <label class="label-form" for="dateBirth"><?= $enJson['form']['register']['labelBirthday'] ?></label>
                  <input id="new-birth" name="dateBirth" value="<?= $_SESSION['user']['birthday'] ?>" class="input--register" type="date" />
               </div>
      </div>
      <div class="backtoback">
         <button class="btn--register" id="updateProfile"><?=$enJson['profile']['profilModal']['title']?></button>
      </div>
   </form>
</div>
<script>
   const dataUser = [];
   dataUser.push(document.getElementById('new-username'));
   dataUser.push(document.getElementById('new-email'));
   dataUser.push(document.getElementById('new-birth'));
   formUpdateUser.addEventListener("keyup", function(e) {
      for (const i in dataUser) {

         if (dataUser[i].value != 0) {
            dataUser[i].classList.remove("show-error-connection");
         }
      }
   });
   formUpdateUser.onsubmit = (e) => {
      for (const i in dataUser) {
         if (dataUser[i].value == 0) {
            e.preventDefault();
            dataUser[i].placeholder = ('Put your ' + dataUser[i].id);
            dataUser[i].classList.add("show-error-connection");
            i = false;
         }
      }
     if(i == false){
         $(function() {
            toastr.error('<?= $enJson['form']['error']['signup'] ?>', '');
         });
      }

   }
   $('input[type="file"]').on('change', (e) => {
      let that = e.currentTarget
      if (that.files && that.files[0]) {
         let reader = new FileReader()
         reader.onload = (e) => {
            $('#previewProfile').attr('src', e.target.result)
         }
         reader.readAsdataUserURL(that.files[0])
      }
   })
</script>