<?php

namespace App\Imports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionsImport implements ToModel
{
   public function model(array $row)
    {
        // dd($row);
        return new Transaction([
            'name_on_card'     => $row[1],
            'card_no'    => $row[1], 
            'exp_month'    => $row[2], 
            'exp_year'    => $row[3], 
            'cvv'    => $row[4], 
        ]);
    }
}
