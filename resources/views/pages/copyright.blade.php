<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Filkom's Team</title>
    <link rel="icon" type="image/x-icon" href="http://www.google.com/s2/favicons?domain=https://filkom.ub.ac.id">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/16c5b336ee.js"></script>
    <style>
        body {
            font-family: tahoma;
            height: 100%;
            background-image: url(https://picsum.photos/g/2560/1600);
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
        }

        .our-team {
            padding: 30px 0 40px;
            margin-bottom: 30px;
            background-color: #f7f5ec;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .our-team .picture {
            display: inline-block;
            height: 130px;
            width: 130px;
            margin-bottom: 50px;
            z-index: 1;
            position: relative;
        }

        .our-team .picture::before {
            content: "";
            width: 100%;
            height: 0;
            border-radius: 50%;
            background-color: red;
            position: absolute;
            bottom: 135%;
            right: 0;
            left: 0;
            opacity: 0.9;
            transform: scale(3);
            transition: all 0.3s linear 0s;
        }

        .our-team:hover .picture::before {
            height: 100%;
        }

        .our-team .picture::after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            /* background-color: red; */
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .our-team .picture img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            transform: scale(1);
            transition: all 0.9s ease 0s;
            filter: grayscale(100%)
        }

        .our-team:hover .picture img {
            box-shadow: 0 0 0 14px #f7f5ec;
            transform: scale(0.8);
            filter: grayscale(0%);
            
        }

        .our-team .title {
            display: block;
            font-size: 15px;
            color: #4e5052;
            text-transform: capitalize;
        }

        .our-team .social {
            width: 100%;
            padding: 0;
            margin: 0;
            background-color: red;
            position: absolute;
            bottom: -100px;
            left: 0;
            transition: all 0.5s ease 0s;
        }

        .our-team:hover .social {
            bottom: 0;
        }

        .our-team .social li {
            display: inline-block;
        }

        .our-team .social li a {
            display: block;
            padding: 10px;
            font-size: 17px;
            color: white;
            transition: all 0.3s ease 0s;
            text-decoration: none;
        }

        .our-team .social li a:hover {
            color: red;
            background-color: #f7f5ec;
        }
        .mycard {
            transition: transform .2s
        }
        .mycard:hover {
            transform: scale(1.01);
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="mycard col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" style="width: 130px; height: 130px;" src="/img/copyright/bima.JPG">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Yanuar Bima</h3>
                        <h4 class="title">Web Developer</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://instagram.com/yanuar.bimantoro" class="fa fa-instagram"
                                aria-hidden="true"></a></li>
                        <li><a href="mailto:bima.aji1380@gmail.com" class="fa fa-envelope"
                                aria-hidden="true"></a></li>
                        <li><a href="https://www.linkedin.com/in/yanuar-bimantoro-aji-874232196/" class="fa fa-linkedin"
                                aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="mycard col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" style="width: 130px; height: 130px;" src="/img/copyright/via.jpeg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Selamita Via</h3>
                        <h4 class="title">Product Manager</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://instagram.com/selamitavia" class="fa fa-instagram"
                                aria-hidden="true"></a></li>
                        <li><a href="mailto:selamitaputri1@gmail.com" class="fa fa-envelope"
                                aria-hidden="true"></a></li>
                        <li><a href="https://www.linkedin.com/in/selamita-taufiah-putri-5169151b1/" class="fa fa-linkedin"
                                aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="mycard col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" style="width: 130px; height: 130px;" src="/img/copyright/layli.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Saidah Layli </h3>
                        <h4 class="title">Product Manager</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://www.instagram.com/layli.r_/" class="fa fa-instagram"
                                aria-hidden="true"></a></li>
                        <li><a href="mailto:layli.rmdhn@gmail.com" class="fa fa-envelope"
                                aria-hidden="true"></a></li>
                        <li><a href="https://www.linkedin.com/in/layliromadhoni/" class="fa fa-linkedin"
                                aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="mycard col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" style="width: 130px; height: 130px;" src="/img/copyright/aufa.jpeg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Aufa Azmiraniza</h3>
                        <h4 class="title">UI UX Designer</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://www.instagram.com/aufa.azmrn/" class="fa fa-instagram"
                                aria-hidden="true"></a></li>
                        <li><a href="mailto:aufa.azmrn@gmail.com" class="fa fa-envelope"
                                aria-hidden="true"></a></li>
                        <li><a href="https://www.linkedin.com/in/aufa-azmirania/" class="fa fa-linkedin"
                                aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="mycard col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" style="width: 130px; height: 130px;" src="/img/copyright/intan.jpeg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Luvita Intan</h3>
                        <h4 class="title">UI UX Designer</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://www.instagram.com/luvitaintann/" class="fa fa-instagram"
                                aria-hidden="true"></a></li>
                        <li><a href="mailto:luvitaintancahyani@gmail.com" class="fa fa-envelope"
                                aria-hidden="true"></a></li>
                        <li><a href="https://www.linkedin.com/in/luvitaintan/" class="fa fa-linkedin"
                                aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="mycard col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" style="width: 130px; height: 130px;" src="/img/copyright/rizal.JPG">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Rizal Efendi</h3>
                        <h4 class="title">UI UX Designer</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://www.instagram.com/rizalefnn/" class="fa fa-instagram"
                                aria-hidden="true"></a></li>
                        <li><a href="mailto:rizalefendi61@gmail.com" class="fa fa-envelope"
                                aria-hidden="true"></a></li>
                        <li><a href="https://www.linkedin.com/in/muhammadrizalefendi/" class="fa fa-linkedin"
                                aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
