<?php
  include("includes/config.php");

  // session_destroy();

  if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
  }else {
    header("Location: register.php");
  }
?>

<html>

<head>
  <title>
    Welcome to Spotify
  </title>

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
  
  <div id="mainContainer">

    <div id="topContainer">

      <div id="navBarContainer">
        <nav class="nav-bar">
          <a href="index.php" class="logo">
            <img src="https://img.icons8.com/ios-glyphs/48/ffffff/earbud-headphones.png"/>
          </a>

          <div class="group">
            <div class="nav-item">
              <a href="search.php" class="nav-item__link">
                Search&nbsp;<img src="https://img.icons8.com/ios-filled/20/a0a0a0/search.png" class="icon" alt="Search" />
              </a>
            </div>
          </div>
          
          <div class="group">
            <div class="nav-item">
              <a href="browse.php" class="nav-item__link">Browse</a>
            </div>
            <div class="nav-item">
              <a href="your-music.php" class="nav-item__link">Your Music</a>
            </div>
            <div class="nav-item">
              <a href="profile.php" class="nav-item__link">Profile</a>
            </div>

          </div>
        </nav>
      </div>

      <div id="">

      </div>


    </div>

    <div id="nowPlayingBarContainer">
      <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
          <div class="content">
            <span class="album-link">
              <img class="album-artwork" src="https://img.icons8.com/fluent/57/000000/picture.png" alt="album-art" />
            </span>
  
            <span class="track-info">
              <span class="track-name">
                <span>HBD</span>
              </span>
  
              <span class="artist-name">
                <span>Kyle</span>
              </span>
            </span>
          </div>
        </div>
  
        <div id="nowPlayingCenter">
          <div class="content player-controls">
            <div class="buttons">
              <button class="control-button shuffle" title="Shuffle button">
                <img src="https://img.icons8.com/ios-filled/24/07d159/shuffle.png" alt="shuffle" />
              </button>
              <button class="control-button previous" title="previous">
                <img src="https://img.icons8.com/ios/24/07d159/rewind.png"/>
              </button>
              <button class="control-button play" title="play">
                <img src="https://img.icons8.com/ios/32/07d159/play-button-circled--v1.png"/>
              </button>
              <button class="control-button stop" title="stop" style="display: none" >
                <img src="https://img.icons8.com/ios/32/07d159/stop-circled--v1.png"/>
              </button>
              <button class="control-button next" title="next">
                <img src="https://img.icons8.com/ios/24/07d159/fast-forward.png"/>
              </button>
              <button class="control-button repeat" title="repeat">
                <img src="https://img.icons8.com/ios/24/07d159/repeat.png"/>
              </button>
            </div>
            <div class="playback-bar">
              <span class="progress-time current">0.00</span>
              <div class="progress-bar">
                <div class="progress-bar-bg">
  
                  <div class="progress"></div>
                </div>
              </div>
              <span class="progress-time remaining">0.00</span>
            </div>
          </div>
        </div>
  
        <div id="nowPlayingRight">
          <div class="volume-bar">
            <button class="control-button volume">
              <img src="https://img.icons8.com/ios-filled/24/a0a0a0/high-volume.png" alt="volume" />
              <img src="https://img.icons8.com/ios-filled/24/202020/mute.png" alt="mute" style="display: none" />
            </button>
  
            <div class="progress-bar">
                <div class="progress-bar-bg">
  
                  <div class="progress"></div>
                </div>
              </div>
          </div>
        </div>
      </div>
      
    </div>

  </div>


</body>

</html>