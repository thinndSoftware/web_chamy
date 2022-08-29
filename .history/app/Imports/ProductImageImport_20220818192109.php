<?php

namespace App\Imports;

use App\Models\ProductImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductImageImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductImage([
            'image_detail' => $row['image_detail'],
            'image_detail_link' => $row['image_detail_link'],
            'product_id' => $row['product_id'],
        ]);
    }
}
