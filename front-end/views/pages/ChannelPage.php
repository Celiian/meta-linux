<?php ob_start() ?>

<body>

   <div class="feature-channel-flex-container">

      <div class="feature-channel-flex-items">

         <div class="feature-channel-navigation-container">

            <div class="feature-channel-navigation-container-zone1">

               <div class="feature-channel-navigation-container-profil">

                  <div class="feature-channel-navigation-container-profilPicture">
                     <button>
                        <img class="img-profile" src="<?php echo $enJson['creation']['Image'] ?>" alt="">
                     </button>
                  </div>
                  <div class="feature-channel-navigation-userInformation">
                     <h3>Name</h3>
                     <h3>Follower</h3>
                  </div>
               </div>

               <div>
                  <h3>Border Zone</h3>
               </div>

            </div>
            <div class="feature-channel-navigation-container-zone2">
               <div></div>
               <div class="feature-channel-elements"><button class="feature-channel-btn-Home">
                     <h3>
                        <?php echo $enJson['channel']['HomeSelection'] ?>
                     </h3>
                  </button> </div>
               <div class="feature-channel-elements"><button class="feature-channel-btn-Videos">
                     <h3>
                        <?php echo $enJson['channel']['VideoSelection'] ?>
                     </h3>
                  </button></div>
               <div class="feature-channel-elements"><button class="feature-channel-btn-Playlists">
                     <h3>
                        <?php echo $enJson['channel']['PlaylistsSelection'] ?>
                     </h3>
                  </button></div>
               <div class="feature-channel-elements"><button class="feature-channel-btn-Channels">
                     <h3>
                        <?php echo $enJson['channel']['ChannelSelection'] ?>
                     </h3>
                  </button></div>
               <div class="feature-channel-elements"><button class="feature-channel-btn-AboutUs">
                     <h3>
                        <?php echo $enJson['channel']['AboutUsSelection'] ?>
                     </h3>
                  </button></div>
               <div class="feature-channel-elements"><button class="feature-channel-btn-Locker">
                     <h3>
                        <?php echo $enJson['channel']['LockerSelection'] ?>
                     </h3>
                  </button></div>
               <div></div>
               <div></div>
               <div></div>
            </div>



         </div>
      </div>
      <div class="feature-channel-flex-items">
         <div class="feature-channel-video-intro"><?php echo $enJson['channel']['introduction'] ?></div>
         <div class="feature-channel-video-online">
            <button><?php echo $enJson['channel']['videoOnline'] ?></button>
            <button><img src="./assets/img/Channel/play.png" alt=""></button>
         </div>
         <div class="feature-channel-video-popular"><button><?php echo $enJson['channel']['popular'] ?></button< /div>
         </div>
      </div>

</body>
<?php $pageName = ob_get_clean() ?>