<?php

namespace Callmeaf\TicketReply\App\Exports\Web\V1;

use Callmeaf\TicketReply\App\Models\TicketReply;
use Callmeaf\TicketReply\App\Repo\Contracts\TicketReplyRepoInterface;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class TicketRepliesExport implements FromCollection,WithHeadings,Responsable,WithMapping,WithCustomChunkSize
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = '';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    private TicketReplyRepoInterface $ticketreplyRepo;
    public function __construct()
    {
        $this->ticketreplyRepo = app(TicketReplyRepoInterface::class);
        $this->fileName = $this->fileName ?: \Base::exportFileName(model: $this->ticketreplyRepo->getModel()::class,extension: $this->writerType);
    }

    public function collection()
    {
        if(\Base::getTrashedData()) {
            $this->ticketreplyRepo->trashed();
        }

        $this->ticketreplyRepo->latest()->search();

        if(\Base::getAllPagesData()) {
            return $this->ticketreplyRepo->lazy();
        }

        return $this->ticketreplyRepo->paginate();
    }

    public function headings(): array
    {
        return [
           // 'status',
        ];
    }

    /**
     * @param TicketReply $row
     * @return array
     */
    public function map($row): array
    {
        return [
            // $row->status?->value,
        ];
    }

    public function chunkSize(): int
    {
        return \Base::config('export_chunk_size');
    }
}
