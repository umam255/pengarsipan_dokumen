<?php

namespace App\Exports;

use App\Models\Certificate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class CertificateExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithEvents
{
    public function headings(): array
    {
        return [
            'No',
            'nama document',
            'Upload by',
            'Created at'
        ];
    }

    public function map($data): array

    {
        return [
            $data->id,
            $data->nama_document,
            $data->upload_by,
            $data->created_at
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Certificate::all();
    }
}
