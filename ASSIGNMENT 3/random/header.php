 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Explore the world of Solo Leveling, its story, characters, hunters, and shadows.">

    <title>Solo Leveling</title>


    <script>
		if (sessionStorage.getItem("driveCraftAuthenticated") !== "true") {
			window.location.replace("index.php");
		} else {
			document.documentElement.classList.add("authenticated");
		}
	</script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #050914;
            color: white;
        }

        .navbar {
            background: rgba(4, 8, 20, 0.94);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(128, 90, 255, 0.35);
        }

        .navbar-brand {
            color: white;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 4px;
        }

        .navbar-brand:hover {
            color: #9b6cff;
        }

        .brand-icon {
            color: #8d5cff;
            font-size: 25px;
            margin-right: 8px;
        }

        .nav-link {
            color: white;
            margin: 0 12px;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #9b6cff;
        }

        .level-btn {
            border: 1px solid #8d5cff;
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .level-btn:hover {
            background: #6f38e8;
            color: white;
        }

        .hero {
            min-height: 700px;

            background-image:
                linear-gradient(
                    to right,
                    rgba(3, 7, 18, 0.93),
                    rgba(4, 8, 22, 0.62),
                    rgba(5, 7, 18, 0.40)
                ),
                url("https://sololeveling-anime.net/assets/img/s3/s3_visual.jpg");

            background-size: cover;
            background-position: center;

            display: flex;
            align-items: center;

            padding-top: 70px;
        }

        .hero-content {
            max-width: 650px;
        }

        .hero-small-title {
            color: #a878ff;
            font-size: 13px;
            letter-spacing: 5px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .hero-title {
            font-size: 70px;
            font-weight: bold;
            letter-spacing: 8px;
            line-height: 1;
            margin-bottom: 25px;

            text-shadow:
                0 0 10px rgba(110, 70, 255, 0.8),
                0 0 25px rgba(110, 70, 255, 0.5);
        }

        .hero-text {
            font-size: 17px;
            line-height: 1.7;
            color: #e1e4f0;
            max-width: 600px;
            margin-bottom: 30px;
        }

        .btn-purple {
            background: linear-gradient(90deg, #5b19d6, #8654ff);
            border: none;
            color: white;
            border-radius: 25px;
            padding: 12px 28px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-purple:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(126, 77, 255, 0.6);
        }

        .section {
            padding: 85px 0;
        }

        .about-section {
            background:
                linear-gradient(
                    rgba(5, 9, 20, 0.90),
                    rgba(5, 9, 20, 0.94)
                ),
                url("https://i.redd.it/wph1qertnexe1.jpeg");

            background-size: cover;
            background-position: center;
        }

        .about-image {
            width: 100%;
            height: 360px;
            object-fit: cover;
            object-position: center;
            border-radius: 5px;
            border: 1px solid rgba(119, 79, 255, 0.5);

            box-shadow:
                0 0 25px rgba(81, 42, 180, 0.25);
        }

        .section-label {
            color: #9565ff;
            font-size: 12px;
            letter-spacing: 4px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 38px;
            font-weight: bold;
            letter-spacing: 3px;
            margin-bottom: 20px;
        }

        .section-text {
            color: #c5c9d7;
            line-height: 1.8;
            font-size: 15px;
        }

        .quote-box {
            border-left: 2px solid #8150ff;
            padding-left: 25px;
            margin-top: 20px;
        }

        .quote-box p {
            color: #d9d2ff;
            font-size: 19px;
            font-style: italic;
            line-height: 1.6;
        }

        .quote-box span {
            color: #9a73ff;
            font-size: 13px;
        }

        .characters-section {
            background: #070b17;
        }

        .characters-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .characters-title h2 {
            font-size: 35px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        .characters-title p {
            color: #9298aa;
            font-size: 14px;
        }

        .character-card {
            height: 100%;
            background: #0b1121;
            border: 1px solid rgba(108, 71, 220, 0.55);
            border-radius: 5px;
            overflow: hidden;
            transition: 0.3s;
        }

        .character-card:hover {
            transform: translateY(-8px);

            border-color: #8c5cff;

            box-shadow:
                0 10px 30px rgba(83, 43, 190, 0.25);
        }

        .character-card img {
            width: 100%;
            height: 270px;
            object-fit: cover;
            object-position: top center;
        }

        .character-body {
            padding: 20px;
        }

        .character-body h3 {
            font-size: 17px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .character-role {
            color: #8f60ff;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .character-body p {
            color: #aeb4c4;
            font-size: 13px;
            line-height: 1.6;
            margin: 0;
        }

        .cta-section {
            min-height: 300px;

            background-image:
                linear-gradient(
                    rgba(6, 8, 20, 0.72),
                    rgba(6, 8, 20, 0.85)
                ),
                url("https://sololeveling-anime.net/assets/img/special/shadows-visual/kaisel.jpg");

            background-size: cover;
            background-position: center;

            display: flex;
            align-items: center;
            text-align: center;
        }

        .cta-content {
            width: 100%;
        }

        .cta-small {
            color: #9a6dff;
            font-size: 12px;
            letter-spacing: 4px;
        }

        .cta-content h2 {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 2px;
            margin: 10px 0 25px;
        }

        .footer {
            background: #030611;
            border-top: 1px solid rgba(121, 82, 240, 0.35);
            padding: 30px 0;
        }

        .footer p {
            text-align: center;
            color: #8e94a6;
            font-size: 12px;
            margin: 0;
        }

        .social-links {
            text-align: center;
            margin-bottom: 15px;
        }

        .social-links a {
            color: white;
            margin: 0 10px;
            font-size: 13px;
            text-decoration: none;
        }

        .social-links a:hover {
            color: #9b6cff;
        }

        @media (max-width: 991px) {

            .navbar-brand {
                font-size: 17px;
            }

            .nav-link {
                margin: 5px 0;
            }

            .level-btn {
                display: inline-block;
                margin-top: 10px;
            }

            .hero {
                min-height: 650px;
            }

            .hero-title {
                font-size: 55px;
            }
        }

        @media (max-width: 767px) {

            .hero {
                min-height: 680px;
                background-position: 65% center;
            }

            .hero-content {
                padding: 30px 20px;
            }

            .hero-small-title {
                font-size: 10px;
                letter-spacing: 3px;
            }

            .hero-title {
                font-size: 42px;
                letter-spacing: 5px;
            }

            .hero-text {
                font-size: 14px;
            }

            .section {
                padding: 65px 20px;
            }

            .about-image {
                height: 280px;
                margin-bottom: 25px;
            }

            .section-title {
                font-size: 30px;
            }

            .characters-title h2 {
                font-size: 28px;
            }

            .cta-content h2 {
                font-size: 26px;
            }
        }

        @media (max-width: 480px) {

            .hero {
                min-height: 650px;
            }

            .hero-title {
                font-size: 35px;
                letter-spacing: 3px;
            }

            .hero-text {
                font-size: 13px;
                line-height: 1.6;
            }

            .btn-purple {
                padding: 10px 22px;
                font-size: 13px;
            }

            .section-title {
                font-size: 27px;
            }

            .about-image {
                height: 240px;
            }

            .character-card img {
                height: 260px;
            }
        }
    </style>