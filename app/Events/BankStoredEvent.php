<?php

namespace CodeFin\Events;

use CodeFin\Models\Bank;
use Illuminate\Http\UploadedFile;

class BankStoredEvent
{
    private $bank;
    private $logo;

    /**
     * BankStoredEvent constructor.
     * @param Bank $bank
     * @param UploadedFile|null $logo
     */
    public function __construct(Bank $bank, UploadedFile $logo = null)
    {
        $this->bank = $bank;
        $this->logo = $logo;
    }

    /**
     * @return Bank
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @return UploadedFile
     */
    public function getLogo()
    {
        return $this->logo;
    }
}
