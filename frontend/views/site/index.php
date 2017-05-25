<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SmartChoice V.2</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        
        <style>
            .mySlides {display:none}
            .w3-left, .w3-right, .w3-badge {cursor:pointer}
            .w3-badge {height:13px;width:13px;padding:0}
            .nav-sidebar { 
                width: 100%;
                padding: 8px 0; 
                border-right: 1px solid #ddd;
            }
            .nav-sidebar a {
                color: #333;
                -webkit-transition: all 0.08s linear;
                -moz-transition: all 0.08s linear;
                -o-transition: all 0.08s linear;
                transition: all 0.08s linear;
                -webkit-border-radius: 4px 0 0 4px; 
                -moz-border-radius: 4px 0 0 4px; 
                border-radius: 4px 0 0 4px; 
            }
            .nav-sidebar .active a { 
                cursor: default;
                background-color: #428bca; 
                color: #fff; 
                text-shadow: 1px 1px 1px #666; 
            }
            .nav-sidebar .active a:hover {
                background-color: #428bca;   
            }
            .nav-sidebar .text-overflow a,
            .nav-sidebar .text-overflow .media-body {
                white-space: nowrap;
                overflow: hidden;
                -o-text-overflow: ellipsis;
                text-overflow: ellipsis; 
            }

            /* Right-aligned sidebar */
            .nav-sidebar.pull-right { 
                border-right: 0; 
                border-left: 1px solid #ddd; 
            }
            .nav-sidebar.pull-right a {
                -webkit-border-radius: 0 4px 4px 0; 
                -moz-border-radius: 0 4px 4px 0; 
                border-radius: 0 4px 4px 0; 
            }
            div.gallery {
                margin: 5px;
                border: 1px solid #ccc;
                float: left;
                width: 180px;
            }

            div.gallery:hover {
                border: 1px solid #777;
            }

            div.gallery img {
                width: 100%;
                height: auto;
            }

            div.desc {
                padding: 15px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <br>
        <h1><center>test github</center></h1>
        <div class="container">

            <div class="jumbotron ">
                <div class="w3-content w3-display-container" style="max-width:800px">
                    <img class="mySlides" src="https://www.w3schools.com/w3css/img_mountains_wide.jpg" style="width:100%">
                    <img class="mySlides" src="https://www.w3schools.com/w3css/img_fjords_wide.jpg" style="width:100%">
                    <img class="mySlides" src="https://www.w3schools.com/w3css/img_nature_wide.jpg" style="width:100%">
                    <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                        <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                        <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2">
                                    <nav class="nav-sidebar">
                                        <ul class="nav">
                                            <li class="active"><a href="javascript:;">Home</a></li>
                                            <li><a href="javascript:;">About</a></li>
                                            <li><a href="javascript:;">Products</a></li>
                                            <li><a href="javascript:;">FAQ</a></li>
                                            <li class="nav-divider"></li>
                                            <li><a href="javascript:;"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="gallery">
                        <a target="_blank" href="img_fjords.jpg">
                            <img src="https://www.w3schools.com/css/img_fjords.jpg" alt="Trolltunga Norway" width="300" height="200">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>

                    <div class="gallery">
                        <a target="_blank" href="img_forest.jpg">
                            <img src="https://www.w3schools.com/css/img_forest.jpg" alt="Forest" width="600" height="400">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>

                    <div class="gallery">
                        <a target="_blank" href="img_lights.jpg">
                            <img src="https://www.w3schools.com/css/img_lights.jpg" alt="Northern Lights" width="600" height="400">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>

                    <div class="gallery">
                        <a target="_blank" href="img_mountains.jpg">
                            <img src="https://www.w3schools.com/css/img_mountains.jpg" alt="Mountains" width="600" height="400">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                    <div class="gallery">
                        <a target="_blank" href="img_mountains.jpg">
                            <img src="https://www.w3schools.com/css/img_mountains.jpg" alt="Mountains" width="600" height="400">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                    <div class="gallery">
                        <a target="_blank" href="img_mountains.jpg">
                            <img src="https://www.w3schools.com/css/img_mountains.jpg" alt="Mountains" width="600" height="400">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function currentDiv(n) {
                showDivs(slideIndex = n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                if (n > x.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-white", "");
                }
                x[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " w3-white";
            }
        </script>
    </body>
</html>