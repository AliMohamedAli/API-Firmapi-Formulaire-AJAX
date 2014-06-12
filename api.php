<?php
echo @file_get_contents('https://firmapi.com/api/v1/company?siren='.$_GET['siren'].'&api_key={KEY}'); //Key à compléter par votre clé d'API