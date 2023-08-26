<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- References -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./javascript/main.js" rel="stylesheet">
    <title>NonMVC - Menu Page</title>
</head>

<body>
    <?php require_once "template.php"; ?>

    <nav class="navbar navbar-expand-lg bg-dark py-lg-4">
        <div class="col-sm">
            <p class="text-white"> Testing</p>
        </div>

        <div class="col-md">
            <p class="text-white"> Crimson Cafe</p>
        </div>

        <div class="col-sm">
            <!-- change this to a list with ul & li -->
            <p class="text-white">"Profile Login"</p>
            <p class="text-white">Staff Login</p>
            <p class="text-white">Menu</p>
        </div>
    </nav>

    <section class="card-section pt-4 mx-4">
        <div class="row">
            <div class="col">
                <?php echo $card ?>
            </div>
            <div class="col">
                <?php echo $card ?>
            </div>
            <div class="col">
                <?php echo $card ?>
            </div>
        </div>
    </section>

    <footer class="pt-4 mx-4">

    </footer>

</body>

</html>
