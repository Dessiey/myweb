<?php

namespace App\Exports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::all();
    }

    public function headings(): array
    {
        return [
            'Name On Card',
            'Card No.',
            'Exp Month',
            'Exp. Year',
            'CVV',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->name_on_card,
            'XXXXXXXXXXXX' . substr($transaction->card_no, -4, 4),
            $transaction->exp_month,
            $transaction->exp_year,
            $transaction->cvv,
        ];
    }
}