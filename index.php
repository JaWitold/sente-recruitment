<!DOCTYPE html>
<html lang="pl-PL">
<head>

    <meta charset="UTF-8">
    <title>Sente zadanie rekrutacyjne</title>

    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
    <![endif]-->

</head>
<body class="bg-dark text-light">
<!-- Modal -->
<div class="modal fade" id="custom-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true""
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-label">nazwa <small>[SKU]</small></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <h6 id="modal-price">cena</h6>
                <p id="modal-description">opis</p>
                <img class="img-fluid" src="https://picsum.photos/600/400.webp?random=1" alt="image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">zamknij</button>
            </div>
        </div>
    </div>
</div>

<header class="container d-flex flex-column align-items-center justify-content-center mt-5">
    <h1 class="h1 mb-3">Sente zadanie rekrutacyjne</h1>

    <section class="my-2 input-group">
        <input type="text" id="search" placeholder="szukaj [sku, nazwa, opis]" class="form-control">
        <label class="input-group-text" for="page">ilość na stronie</label>
        <select id="number" class="form-select">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
        </select>
        <input type="button" class="btn btn-success" id="submit" value="szukaj">
    </section>
    <nav class="my-2 input-group">

        <button id="first" class="btn btn-outline-primary">pierwsza</button>
        <button id="prev" class="btn btn-outline-primary">poprzednia</button>
        <label class="input-group-text" for="page">Strona</label>
        <input type="number" id="page" min="1" step="1" value="1" class="form-control">

        <button id="next" class="btn btn-outline-primary">następna</button>
        <button id="last" class="btn btn-outline-primary">ostatnia</button>

    </nav>

</header>

<main class="container-fluid container-lg">

    <section id="table">
        <?php
        require_once "productView.php";
        ?>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script src="script.js" defer></script>
</body>
</html>