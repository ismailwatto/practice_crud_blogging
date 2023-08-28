<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- This script got from frontendfreecode.com -->

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .footer {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("http://frontendfreecode.com/img/typing.jpg");
            background-size: cover;
        }

        .first {
            margin-top: 40px;
            margin-bottom: 50px;
            color: rgb(206, 206, 206);
            font-family: 'Poppins', sans-serif;
        }

        .first h4 {
            font-size: 20px;
            letter-spacing: 3px;
            position: relative;
            margin-bottom: 20px;
            font-size: 1.6em;
            color: #fff;
            padding-bottom: 0.5em;
        }

        .first h4::after {
            content: '';
            background: #66c83d;
            width: 20%;
            height: 2px;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .first p {
            font-size: 14px;
        }

        .second {
            margin-top: 40px;
            margin-bottom: 50px;
            color: rgb(206, 206, 206);
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }

        .second2 {
            margin-top: 40px;
            margin-bottom: 50px;
            color: rgb(206, 206, 206);
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }

        .second h4 {
            font-size: 20px;
            letter-spacing: 3px;
            position: relative;
            margin-bottom: 20px;
            font-size: 1.6em;
            color: #fff;
            padding-bottom: 0.5em;
        }

        .second h4::after {
            content: '';
            background: #66c83d;
            width: 20%;
            height: 2px;
            position: absolute;
            bottom: 0;
            left: 40%;
        }

        .second li {
            list-style: none;
            padding-bottom: 30px;
        }

        .second a,
        .second2 a {
            color: rgb(206, 206, 206);
            text-decoration: none;
            letter-spacing: 3px;
            font-weight: bold;
            font-size: 14px;
            transition: 0.2s;
        }

        .second a:hover,
        .second2 a:hover {
            color: #fff;
            transition: 0.2s;
            text-shadow: 1px 1px 20px rgba(0, 0, 0, 1);
            text-decoration: none
        }

        .third {
            margin-top: 40px;
            margin-bottom: 50px;
            color: rgb(206, 206, 206);
            font-family: 'Poppins', sans-serif;
            text-align: right;
        }

        .third h4 {
            font-size: 20px;
            letter-spacing: 3px;
            position: relative;
            margin-bottom: 20px;
            font-size: 1.6em;
            color: #fff;
            padding-bottom: 0.5em;
        }

        .third h4::after {
            content: '';
            background: #66c83d;
            width: 20%;
            height: 2px;
            position: absolute;
            bottom: 0;
            left: 80%;
        }

        .third li {
            list-style: none;
            padding-bottom: 15px;
        }

        .third a {
            color: rgb(206, 206, 206);
            text-decoration: none;
            letter-spacing: 3px;
            font-weight: bold;
            font-size: 14px;
            transition: 0.2s;
        }

        .third a:hover {
            color: #fff;
            transition: 0.2s;
            text-shadow: 1px 1px 20px rgba(0, 0, 0, 1);
        }

        @media screen and (max-width:1000px) {
            .first {
                text-align: center;
            }

            .first h4::after {
                left: 40%;
            }
        }

        @media screen and (max-width:1000px) {
            .third {
                text-align: center;
            }

            .third h4::after {
                left: 40% !important;
            }
        }

        .margin {
            margin-left: 20px;
        }

        .line {
            height: 2px;
            background-color: rgb(206, 206, 206);
            width: 100%;
        }

        .container h1 {
            text-align: center;
            margin-top: 100px;
            margin-bottom: 100px;
        }
    </style>

</head>

<body>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="first">
                        <h4>My Skills</h4>
                        <p> Analytical Skills</p>
                        <p> Problem-solving skills</p>
                        <p> Critical-thinking skills</p>
                        <p> Detail-oriented</p>
                        <p> Multitasking</p>
                        <p> Self-motivated</p>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="second">
                        <h4> Navigate</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="third">
                        <h4> Contact</h4>
                        <ul>
                            <li>Name and Family </li>
                            <li></li>
                            <li><i class="far fa-envelope"></i> email@gmail.com</li>
                            <li><i class="far fa-envelope"></i> email@yahoo.com</li>
                            <li><i class="fas fa-map-marker-alt"></i> London, UK </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bcl"><a style="font-size:8pt;text-decoration:none;" href="http://www.devanswer.com">Free Frontend</a>
    </div>

</body>

</html>