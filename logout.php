<!--
	Student Names: Ronquillo, Michael Arnold, De Guzman, John Yuri, Laurel, Andrei Jovic
	Section: WD-202
	Site Name: Valiant Esports - logout.php
	Date: April 2024
	-->

    <?php

@include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:login_form.php');

?>