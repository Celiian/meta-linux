 <button class="btnprofile"
     onclick="document.getElementById('password').style.display='block'"><?=$enJson['profile']['button']['buttonPassword']?></button>




 <div id="password" class="modal" <?php if ($_SESSION['process'] == 'password') echo 'style = "display : block";'; ?>>
     <form class="modal-content" enctype="multipart/form-data" id="formUpdatePass" method="post"
         action="/front-end/actions/UpdatePassword.php">
         <div class="close-form">
             <a onclick="document.getElementById('password').style.display='none' <?php $_SESSION['process'] = '' ?>"
                 class="close" title="Close Modal">&times;</a>

         </div>
         <div class="wrapper-part-profile">
             <div>
                 <label class="label-form" for="password"><?=$enJson['profile']['passModal']['oldpassword']?></label>
                 <input name="old-password" class="input--register" type="password" id="old-password" />
             </div>

             <div>
                 <label class="label-form" for="password"><?=$enJson['profile']['passModal']['newpassword']?></label>
                 <input name="new-password" class="input--register" type="password" id="new-password" />
             </div>

             <div>
                 <label class="label-form"
                     for="password"><?=$enJson['profile']['passModal']['confirmpassword']?></label>
                 <input name="confirm-password" class="input--register" type="password" id="confirm-password" />
             </div>
         </div>

         <div class="backtoback">
             <button class="btn--register" id="updatePass"><?= $enJson['form']['updatePass']['buttonUpdate'] ?></button>
         </div>
     </form>
 </div>

 <script>
i = true;
const dataPass = [];
dataPass.push(document.getElementById('old-password'));
dataPass.push(document.getElementById('new-password'));
dataPass.push(document.getElementById('confirm-password'));
formUpdatePass.addEventListener("keyup", function(e) {
    for (var y in dataPass) {

        if (dataPass[y].value != 0) {
            dataPass[y].classList.remove("show-error-connection");
        }
    }
});
formUpdatePass.onsubmit = (e) => {


    for (var y in dataPass) {
        if (dataPass[y].value == 0) {
            e.preventDefault();
            dataPass[y].placeholder = ('Put your ' + dataPass[y].id);
            dataPass[y].classList.add("show-error-connection");
            i = false;
        }
    }

    if (i == false) {
        $(function() {
            toastr.error('<?= $enJson['form']['error']['signup'] ?>', '');
        });
    }


}
 </script>