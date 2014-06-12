<?php
echo @file_get_contents('https://firmapi.com/api/v1/company?siren='.$_GET['siren'].'&api_key=14588e79cc9c7fdb8143d3c1bf1c47b3d34afa03');