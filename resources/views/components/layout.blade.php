<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title ?? 'Basecamp'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style scoped>
        @import 'https://fonts.googleapis.com/css?family=Montserrat';
* {
  font-family: Montserrat;
}




a {
  color: #777;
  text-decoration: none;
}

p {
  margin: 0 0 45px 0;
  text-align: justify;
}

.header {
  width: 80%;
}

h1,h2,h3,h4,h5,h6 {
  font-family: Montserrat;
  font-weight: 600;
  color: #484848;
  margin: 30px 0 25px 0;
  line-height: 1.3
}

.container {
  padding: 0 20px;
  margin: 0 auto
}

.container:after,
.container:before {
  content: " ";
  display: table
}

.container:after {
  clear: both
}

.intro h1 {
  color: #000;
}

.intro h1 strong {
  color: #ffd300
}


/* - link under - */

.link-arrow:after {
  content: '';
  background-size: 100% 100%;
  width: 16px;
  height: 12px;
  position: absolute;
  top: 5px;
  right: -28px;
  -webkit-transition: all .4s cubic-bezier(.35, 1, .33, 1);
  transition: all .4s cubic-bezier(.35, 1, .33, 1)
}

.link-arrow:hover:after {
  right: -35px
}

.link-arrow.link-arrow-white:after {
  background-size: 100% 100%
}

.link-arrow-hover:after {
  right: -35px
}

.link {
  display: inline-block;
  position: relative;
  border: none;
  padding-bottom: 4px;
  text-transform: uppercase;
  font-family: Montserrat, helvetica, arial, sans-serif;
  font-weight: 700
}

.link:active,
.link:focus,
.link:hover {
  outline: 0
}

.link:before {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  background: #000;
  width: 0;
  height: 2px;
  -webkit-transition: all .4s cubic-bezier(.35, 1, .33, 1);
  transition: all .4s cubic-bezier(.35, 1, .33, 1)
}

.link:hover {
  color: #000
}

.link:hover:before {
  width: 100%
}

.link-theme:before {
  background: #ffd300
}

@media only screen and (min-width:250px) {
  .main {
    padding-top: 150px;
  }
  .container {
    width: 80%;
  }
  h1 {
    font-size: 30px;
  }
  h2 {
    font-size: 20px;
  }
  
@media only screen and (min-width:768px) {
  .main {
    padding-top: 150px;
  }
  .container {
    width: 80%;
  }
  h1 {
    font-size: 48px;
  }
  h2 {
    font-size: 28px;
  }
  .footer {
    padding: 70px 0
  }
  .footer ul {
    margin-top: 15px
  }
  .footer ul li {
    display: inline-block;
    margin: 0 0 0 10px
  }
 
  .footer .foot-content-left {
    float: left
  }
  .footer .foot-content {
    float: right
  }
}

@media only screen and (min-width:992px) {
  .container {
    width: 80%;
  }
  h1 {
    font-size: 60px;
  }
  h2 {
    font-size: 28px;
  }

}

@media only screen and (min-width:1200px) {
  .container {
    width: 1160px;
    width: 80%;
  }
  h1 {
    font-size: 80px;
  }
  h2 {
    font-size: 30px;
  }

}

/* header   box-shadow: 1px 1px 4px 0 rgba(0,0,0,.1); */

.header {
  background-color: #fff;
  position: fixed;
  width: 80%;
  z-index: 3;
  margin-left: 10%;
  margin-right: 10%;
  padding: 20px 0;
}

.header ul {
  margin: 0;
  padding: 0;
  list-style: none;
  overflow: hidden;
  background-color: #fff;
}

.header li a {
  display: block;
  padding: 20px 20px 4px 20px;
  text-decoration: none;
}

.header li a:hover,
.header .menu-btn:hover {
  background-color: #fff;
}

.header .logo {
  color: #ffd300;
  display: block;
  float: left;
  font-size: 2em;
  padding: 2px 0px;
  text-decoration: none;
}

/* menu */

.header .menu {
  clear: both;
  max-height: 0;
  transition: max-height .2s ease-out;
}

/* menu icon */

.header .menu-icon {
  cursor: pointer;
  display: inline-block;
  float: right;
  padding: 28px 20px;
  position: relative;
  user-select: none;
}

.header .menu-icon .navicon {
  background: #333;
  display: block;
  height: 2px;
  position: relative;
  transition: background .2s ease-out;
  width: 18px;
}

.header .menu-icon .navicon:before,
.header .menu-icon .navicon:after {
  background: #333;
  content: '';
  display: block;
  height: 100%;
  position: absolute;
  transition: all .2s ease-out;
  width: 100%;
}

.header .menu-icon .navicon:before {
  top: 5px;
}

.header .menu-icon .navicon:after {
  top: -5px;
}

/* menu btn */

.header .menu-btn {
  display: none;
}

.header .menu-btn:checked ~ .menu {
  max-height: 240px;
}

.header .menu-btn:checked ~ .menu-icon .navicon {
  background: transparent;
}

.header .menu-btn:checked ~ .menu-icon .navicon:before {
  transform: rotate(-45deg);
}

.header .menu-btn:checked ~ .menu-icon .navicon:after {
  transform: rotate(45deg);
}

.header .menu-btn:checked ~ .menu-icon:not(.steps) .navicon:before,
.header .menu-btn:checked ~ .menu-icon:not(.steps) .navicon:after {
  top: 0;
}

/* section */

.section {
  overflow: hidden;
  margin: auto;
  max-width: 1400px;
}

.section a {
  position: relative;
  float: left;
  width: 100%;
}

.section a img {
  width: 100%;
  display: block;
}

.section a span {
  color: #fff;
  position: absolute;
  left: 5%;
  bottom: 5%;
  font-size: 2em;
  text-shadow: 1px 1px 0 #000;
}

.section-split a span {
  display: none;
}

.section-split a:hover span {
  display: block;
}

/* 48em = 768px */

@media (min-width: 875px) {
  .header li {
    float: left;
  }
  .header li a {
    padding: 20px 0px 0px 0px;
    margin-left: 30px;
  }
  .header .menu {
    clear: none;
    float: right;
    max-height: none;
  }
  .header .menu-icon {
    display: none;
  }
}

/* 48em = 768px */

@media (min-width: 48em) {
  .section-split a {
    width: 50%;
  }
}
}


    </style>
</head>
<body class="page-top">
    
   
    <header class="header">
        <a class="logo" href="/">Basecamp</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
          <li><a href="#one" class="link link-theme link-arrow">HOME</a></li>
          <li><a href="#two" class="link link-theme link-arrow">SERVICE</a></li>
          <li><a href="#three" class="link link-theme link-arrow">ABOUT US</a></li>
          <li><a href="#four" class="link link-theme link-arrow">CONTACT</a></li>
        </ul>
      </header>
      <div id="main" class="main">
        {{ $slot }}

      </div>
</body>
</html>