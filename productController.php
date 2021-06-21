<?php
require_once "productModel.php";

class productController
{
    public static function search(string $search, int $number, int $start, int &$total)
    {
        $list = null;
        if (file_exists("data.json")) {
            $data = json_decode(file_get_contents("data.json"));

            $list = [];
            foreach ($data as $item) {
                if (stristr($item->SKU, $search) || stristr($item->name, $search) || stristr($item->description, $search)) {
                    array_push($list, new product($item));
                }
            }
        }
        $total = count($list);

        return array_splice($list, $start, $number);
    }
}

return  productController::class;

