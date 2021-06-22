<?php

/**
 * @param $s
 * @return string
 */
function addZeros($s): string {
    $s = strval($s);
    if(strlen($s) > 3 && $s[strlen($s) - 3] == '.') {
        return $s;
    } else if($s[strlen($s) - 2] == '.') {
        return $s."0";
    }
    else return $s.".00";
}

function showList(string $search, int $number, int $start = 0)
{

    $controller = require_once "productController.php";
    $total = 0;
    $list = $controller::search($search, $number, $start, $total);

    echo "<input type='hidden' value='".$total."' name='total' id='total'>";
    echo "<input type='hidden' value='".$start."' name='current' id='current'>";

    if ($list != null) {

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
            echo "<tr role='button' data-bs-toggle='modal' data-bs-target='#custom-modal' id=". $key + 1 + $start .">";

            echo "<td>" . $key + 1 + $start. "</td>";
            echo "<td>" . $item->getSKU() . "</td>";
            echo "<td>" . $item->getName() . "</td>";
            echo "<td>" . $item->getDescription() . "</td>";
            echo "<td>" . ($item->getDiscount() != 0 ? ("<s>" . addZeros($item->getPrice()) . "</s><span class='text-success fw-bold'> " . addZeros($item->getDiscountPrice()) . "</span> ") : (addZeros($item->getPrice()))) . " " . $item->getCurrency() . "</td>";
            echo "<td>" . ($item->getDiscount() != 0 ? ($item->getDiscount() . "%") : ("")) . "</td>";

            echo "</tr>";
        }
        echo '</tbody></table>';

    } else {
        echo "<h1 class='h1 text-center mt-5'>Nie znaleziono produktów</h1>";
    }
}

$search = isset($_POST['search']) ? filter_input(INPUT_POST, "search", FILTER_SANITIZE_STRING) : "";
$number = isset($_POST['number']) ? filter_input(INPUT_POST, "number", FILTER_SANITIZE_STRING) : 10;
$start = isset($_POST['start']) ? filter_input(INPUT_POST, "start", FILTER_SANITIZE_STRING) : 0;

showList($search, $number, $start);