<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {background-color : #ededed; font-family : "Open Sans", sans-serif;}

h1 {padding: 40px; text-align: center; font-size: 1.5em;}

li a {text-decoration : none; color : #2d2f31;}


nav {
  width : 300px; 
  background: #d9d9d9;
  margin : 40px auto; 
}

span {
  padding : 30px;
  background : #2d2f31; 
  color : white;
  font-size : 1.2em;
  font-variant : small-caps;
  cursor : pointer;
  display: block;
}

span::after {
  float: right;
  right: 10%;
  content: "+";
}

.slide {
  clear:both;
  width:100%;
  height:0px;
  overflow: hidden;
  text-align: center;
  transition: height .3s ease;
}

.slide li {padding : 30px;}

#touch {position: absolute; opacity: 0; height: 0px;}    

#touch:checked + .slide {height: 300px;} 
</style>
</head>
<body style="background-color:white;">

<h1>CSS Dropdown Menu</h1>

<nav>

  <label for="touch"><span>TASTE OF DILLI</span></label>               
  <input type="checkbox" id="touch"> 

  <ul class="slide">
    <li><a href="#">VEG</a></li> 
    <li><a href="#">CHAAP'S</a></li>
    <li><a href="#">TIKKA'S</a></li>
  </ul>

</nav> 

</body>
</html>
