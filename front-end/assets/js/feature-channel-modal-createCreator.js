const modalAccount = document.querySelector(".bloc-modal");
const modalCreationAccount = document.querySelector(".feature-channel-modal-overlay-channel");
const modalUploadVideo = document.querySelector(".modal-container-channel");
const modalCreateUploadVideo = document.querySelector(".feature-channel-modal-overlay-uploadVideo")

function feature_open_accountCreator_function(){
    console.log(modalAccount)
    modalAccount.classList.add("show");
    modalCreationAccount.classList.add("show");
}

function feature_remove_accountCreator_function() {
    modalAccount.classList.remove("show");
     modalCreationAccount.classList.remove("show");    
}

function feature_create_account() {
    console.log("test for create account")

 var modalAccountName = document.querySelector(".feature-channel-modal-username");
 if(modalGetAccountName == ""){
    modalAccountName.style.border ="1px solid red";
    console.log(modalAccountName)
 }
 else{
 const modalGetAccountName = document.querySelector(".feature-channel-modal-username").value;
     modalAccountName.style.border ="1px solid black";
     console.log(modalGetAccountName);
 }
 
}

function feature_open_upload_function(){
    console.log("test for upload")

    modalUploadVideo.classList.add("show");
    console.log(modalUploadVideo);

    modalCreateUploadVideo.classList.add("show");
    console.log(modalCreateUploadVideo);

}

function feature_remove_upload_function(){
    modalUploadVideo.classList.remove("show");
    modalCreateUploadVideo.classList.remove("show");
}


