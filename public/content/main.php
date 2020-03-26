<?php

/**
 * Returns the header part with a given site title
 *
 * @param $title
 * @return string
 */
function getHeader($title)
{
    return "<!DOCTYPE html>
        <html lang='de'>
            <head>
                <!-- Latest compiled and minified CSS -->
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>

                <!-- jQuery library -->
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

                <!-- Popper JS -->
                <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>

                <!-- Latest compiled JavaScript -->
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>

                <link rel='stylesheet' type='text/css' href='style.css'>

                <meta charset='UTF-8'>
                <title>" . $title . "</title>
            </head>
            <body>
                <header>
                    <nav class='navbar navbar-dark bg-dark nav-height'>
                        <a class='navbar-brand' href='?page=main'>QUERII</a>
                        <ul class='navbar-nav'>
                            <li class='nav-item active'>
                                <a class='nav-link' href='?page=add'>Add site</a>
                            </li>
                        </ul>
                    </nav>
                </header>
                <main role='main'>";
}

/**
 * returns the footer line
 *
 * @return string
 */
function getFooter()
{
    return "</main>
            <!-- Footer -->
            <footer class='page-footer font-small blue' id='footer'>
                <!-- Copyright -->
                <div class='footer-copyright text-center py-3'>© 2020 Copyright: Lukas Dumberger & Patrick Kratzer<br><a href='./?page=docs'>About QUERII</a></div>
            </footer>
            <script src='functions.js'></script>
        </body>
    </html>";
}