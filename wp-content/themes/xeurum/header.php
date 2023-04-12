<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
        <?php wp_head(); ?>
	</head>

	<body>
		<header>
            <div class="container">
                <div class="row">
                    <div class="wrapper">
                        <div class="logo_wrapper">
                            <a href="/">XEURUM</a>
                        </div>
                        <div class="menu_wrapper">
                            <div id="burger" class="burger_wrapper">
                                <span class="line line_top"></span>
                                <span class="line line_middle"></span>
                                <span class="line line_bottom"></span>
                            </div>
                            <?php wp_nav_menu(['theme_location'  => 'headerMenu']); ?>
                        </div>
                    </div>
                </div>
            </div>
		</header>
        <main>
		