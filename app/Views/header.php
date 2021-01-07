<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />

    <style>
        :root {
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #1abc9c;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #1abc9c;
            --secondary: #2c3e50;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
        }

        .bg-secondary {
            background-color: #2c3e50 !important;
            color: white !important;
        }

        .navbar-brand {
            color: #fff;
            font-weight: 700;
            font-size: xx-large;
        }

        a.nav-link {
            color: #fff;
        }

        a.nav-link:hover {
            color: #1abc9c;
        }

        a.nav-link:active,
        a.nav-link:focus {
            color: #fff;
        }

        a.nav-link.active {
            color: #1abc9c;
        }

        a.bg-secondary:hover,
        a.bg-secondary:focus,
        button.bg-secondary:hover,
        button.bg-secondary:focus {
            background-color: #1a252f !important;
        }

        * {
            font-family: 'Montserrat', sans-serif;
            ;
        }

        #bg-valid {
            background-image: url(https://drive.google.com/uc?export=view&id=1b2Lu9rQ6fnW1xJN86sq1wilTpv3RSTqR);
            background-position: center;
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-size: 100%;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            filter: opacity(60%);
            /*     display: none; */
        }
    </style>
</head>

<body>

    <div id="bg-valid"> </div>