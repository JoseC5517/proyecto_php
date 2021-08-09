<?php #require_once "partes/head.php";?>

<link rel="shortcut icon" href="img/sala.ico" type="image/x-icon">
<title><?php echo $pagina?></title>
<!-- <input type="checkbox" id="menu-toggle"/>
  <label id="trigger" for="menu-toggle"></label>
  <label id="burger" for="menu-toggle"></label>
  <ul id="menu">
    <li><a href="actores.php">Actores</a></li>
    <li><a href="categoria.php">Categorias</a></li>
    <li><a class="activo" href="pais.php">Pais</a></li>
    <li><a href="lenguaje.php">Idiomas</a></li>
  </ul> -->
<style>
    @font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    src: local('Open Sans'), local('OpenSans'), url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3bO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
}

@font-face {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 700;
    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzKRDOzjiPcYnFooOUGCOsRk.woff) format('woff');
}

html {
    background: #F80000;
    color: #333;
    font-size: 10px;
    font-family: 'Avenir Next', Open Sans, sans-serif;
    line-height: 1;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
     -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

body {
  margin: 0;
  padding: 0;
}

  
section {
  height: 100vh;
  overflow: hidden;
  position: relative;
  color: #fff;
}

section:before {
  background: linear-gradient(to bottom, rgba(72, 172, 1, 0.28), rgba(72, 172, 1, 0.28)),
  url('http://cdn.pixabay.com/photo/2016/03/26/13/09/organic-1280538_960_720.jpg') no-repeat bottom;
  background-size: cover;
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: -1;
}

section:after {
  background: #F9FCFF;
  content: "";
  height: 40rem;
  left: -5%;
  position: absolute;
  right: -5%;
  top: 65%;
  transform-origin: 0 0;
  transform: rotateZ(-7deg);
  z-index: 0;
  background: rgb(121, 121, 121) ;
}

.layer {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background-color: rgb(226, 226, 226);
}
.animate-pop-in {
  animation: pop-in .6s cubic-bezier(0, 0.9, 0.3, 1.2) forwards;
  opacity: 0;
}
@keyframes pop-in {
  0% {
    opacity: 0;
    transform: translate(-4rem) scale(.8);
  }
  100% {
    opacity: 1;
    transform: none;
  }
}


.rocky-dashed {
  animation-delay: .6s;
  max-width: 100%;
  width: 270px;
}
.header-title {
  animation-delay: .8s;
  font-size: 3.8em;
  line-height: normal;
  margin: 0;
  margin-top: 10px;
  text-shadow: 2px 2px 2px black;
}
.header-subtitle {
  animation-delay: 1s;
  font-size: 100px;
  line-height: normal;
  margin: 10px auto 15px;
  text-shadow: 1px 1px 1px black; 
}
.header-button {
  animation-delay: 1.1s;
  line-height: normal;
  margin: 0;
  margin-top: 25px;
  text-shadow: 2px 2px 2px black;
}
.header-button a{
  color: #fff;
  text-decoration: none;
  font-size: 1.5em;
  font-weight: bold;
  background-color: teal;

  padding: 0.6em 2em;  
  border-radius: 4px;
  text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.36);
}

.center-absolute {
    width: 100%;
    position: absolute;
    left: 50%;
    z-index: 999;
    top: 46%;
    text-align: center;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
}
@keyframes rotate-up {
  100% {
    transform: rotateZ(-4deg);
  }
}
</style>
  <header>
<section class="header-content">
  <div class="layer"></div>
  <div class="center-absolute">
     <img class="rocky-dashed animate-pop-in" src="img/wiki.png" alt="">
  <h1 class="header-title animate-pop-in">Welcome!<br>To</h1>
  <h3 class="header-subtitle animate-pop-in"><?php echo $pagina?></h3>
  
  <p class="header-button animate-pop-in">
    <a href="actores.php" class="button">Continue</a>    
  </p>

  </div>
</section>
</header>

<?php #require_once "partes/foot.php";?>