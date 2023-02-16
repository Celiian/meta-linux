<button class="btnprofile" onclick="document.getElementById('delete').style.display='block'"><?=$enJson['profile']['button']['buttonDelete']?></button>

<div id="delete" class="modal">

  <form class="modal-content" action="/back-end/actions/DeleteAccount.php">
    <span onclick="document.getElementById('delete').style.display='none'" class="close" title="Close Modal">&times;</span>
    <div class="container">
      <h1><?=$enJson['profile']['deleteModal']['title']?></h1>
      <p><?=$enJson['profile']['deleteModal']['sentence']?></p>

      <div class="clearfix">
        <button type="button" class="cancelbtn buttonModale" onclick="document.getElementById('delete').style.display='none'">Cancel</button>
        <button type="submit" class="deletebtn buttonModale" onclick="document.getElementById('delete').style.display='none'">Delete</button>
      </div>
    </div>
  </form>
</div>