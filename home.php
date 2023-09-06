<html>
<head>
    <title>Navbar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        nav {
            background: #708090	;
            height: 80px;
            width: 100%;
        }

        .logo {
            color: #fff;
            font-size: 35px;
            font-weight: bold;
            line-height: 80px;
            padding: 50px;
        }

        nav ul {
            float: right;
            margin-right: 30px;
        }

        nav ul li {
            display: inline-block;
            line-height: 80px;
            margin: 0px 5px;
        }

        nav ul li a {
            color: #fff;
            font-size: 20px;
            padding: 7px 13px;
            border-radius: 5px;
        }

        a.active,
        a:hover {
            background-color: #B0C4DE;
        }

        section {
           background: url("/semproject1/car.jpg");
            background-size: cover;
           background-position: center;
           height: 87vh;
            width: 100%;
        }
		 video {
            width: 670px;
            margin-left: 25%;
        }
    </style>
</head>

<body>
    <nav>
        <label class="logo">GoRent</label>
        <ul>
            <li><a href="home.php" class="active">HOME</a></li>
			<li><a href="register.html">REGISTER</a></li>
            <li><a href="book.html">BOOK</a></li>
            <li><a href="bill.html">BILL</a></li>
            <!--<li><a href="admin.html">ADMIN</a></li>-->
        </ul>
    </nav>
	<section>
		 <!--<video loop autoplay muted src="/semproject1/carvid.mp4"></video>-->
	</section>
</body>

</html>