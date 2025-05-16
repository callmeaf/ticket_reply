<?php

namespace Callmeaf\TicketReply\App\Imports\Api\V1;

use Callmeaf\Base\App\Services\Importer;
use Callmeaf\TicketReply\App\Enums\TicketReplyStatus;
use Callmeaf\TicketReply\App\Repo\Contracts\TicketReplyRepoInterface;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TicketRepliesImport extends Importer implements ToCollection,WithChunkReading,WithStartRow,SkipsEmptyRows,WithValidation,WithHeadingRow
{
    private TicketReplyRepoInterface $ticketreplyRepo;

    public function __construct()
    {
        $this->ticketreplyRepo = app(TicketReplyRepoInterface::class);
    }

    public function collection(Collection $collection)
    {
        $this->total = $collection->count();

        foreach ($collection as $row) {
            $this->ticketreplyRepo->freshQuery()->create([
                // 'status' => $row['status'],
            ]);
            ++$this->success;
        }
    }

    public function chunkSize(): int
    {
        return \Base::config('import_chunk_size');
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        $table = $this->ticketreplyRepo->getTable();
        return [
            // 'status' => ['required',Rule::enum(TicketReplyStatus::class)],
        ];
    }

}
