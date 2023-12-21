<!doctype html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>cambiar nombre</title>
</head>

<body>
    <div class="mt-5">
        <h1>Cambia tu Nombre!</h1>
        <p>Ingrese el nuevo nombre seleccionado.</p>
    </div>

    <div class="wrapper">
        <form class="form-group d-flex flex-direction-center align-items-center text-center flex-column"
            action="../services/updateName.php" method="post">
            <label for="name">Ingrese su nombre nuevo </label>
            <input type="text" class="form-control" name="name" id="name ">
            <input type="submit" class="btn btn-primary mt-2 w-25   h-25" value="Cambiar">


        </form>
        <style type="text/css">
            body {
                font: 14px sans-serif;
                background-color: #5f4dee;
                color: white;
            }

            .wrapper {
                width: 350px;
                padding: 20px;
                border: 1px solid #E1E1E1;
                border-radius: 5px;
                background-color: white;
                color: grey;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            p {
                text-align: center;
                font: "Open Sans", sans-serif;
            }

            h1 {
                text-align: center;
                font: 700 2.5rem/3.125rem "Open Sans", sans-serif;
            }

            .btn-primary {
                display: inline-block;
                width: 100%;
                height: 3.125rem;
                border: 1px solid #5f4dee;
                border-radius: 1.5rem;
                background-color: #5f4dee;
                color: #fff;
                font: "Open Sans", sans-serif;
                cursor: pointer;
                transition: all 0.2s;
            }
        </style>
        </head>

        <body>







            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        </body>

</html>