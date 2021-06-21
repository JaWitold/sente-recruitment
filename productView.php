<?php

function showList(string $search, int $number, int $start = 0)
{

    $controller = require_once "productController.php";
    $total = 0;
    $list = $controller::search($search, $number, $start, $total);

    if ($list != null) {
        echo "<input type='hidden' value='".$total."' name='total' id='total'>";
        echo "<input type='hidden' value='".$start."' name='current' id='current'>";
        echo '<table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th>Lp.</th>
                    <th>SKU</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Cena</th>
                    <th>Zniżka</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($list as $key => $item) {
            echo "<tr>";

            echo "<td>" . $key + 1 + $start. "</td>";
            echo "<td>" . $item->getSKU() . "</td>";
            echo "<td>" . $item->getName() . "</td>";
            echo "<td>" . $item->getDescription() . "</td>";
            echo "<td>" . ($item->getDiscount() != 0 ? ("<s>" . $item->getPrice() . "</s><span class='text-success'> " . $item->getDiscountPrice() . "</span> ") : ($item->getPrice())) . " " . $item->getCurrency() . "</td>";
            echo "<td>" . ($item->getDiscount() != 0 ? ($item->getDiscount() . "%") : ("")) . "</td>";

            echo "</tr>";
        }
        echo '</tbody></table>';

    } else {
        echo "<h1>Nie znaleziono produktów</h1>";
    }
}

$search = isset($_POST['search']) ? filter_input(INPUT_POST, "search", FILTER_SANITIZE_STRING) : "";
$number = isset($_POST['number']) ? filter_input(INPUT_POST, "number", FILTER_SANITIZE_STRING) : 10;
$start = isset($_POST['start']) ? filter_input(INPUT_POST, "start", FILTER_SANITIZE_STRING) : 0;

showList($search, $number, $start);