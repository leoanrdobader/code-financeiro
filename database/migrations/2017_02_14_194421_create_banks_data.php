<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBanksData
 */
class CreateBanksData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var @var CodeFin\Repositories\BankRepository $repository */
        $repository = app(CodeFin\Repositories\BankRepository::class);
        foreach ($this->getData() as $bankArray){
            $repository->create($bankArray);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $repository = app(\CodeFin\Repositories\BankRepository::class);
        $repository->skipPresenter(true);
        $banks = $repository->all();
        foreach ($this->getData() as $bankArray) {
            $bank = $repository->findByField('name', $bankArray['name'])->first();
            $dest = \CodeFin\Models\Bank::logosDir();
            \Storage::disk('public')->delete($dest.'/'.$bank->logo);
            $bank->delete();
        }
    }

    public function getData(){
        return [
            [
                'name' => 'Caixa',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/logo-caixa.jpg'),
                    'logo-caixa.jpg'
                )
            ],
            [
                'name' => 'Bradesco',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/logo-bradesco.jpg'),
                    'logo-bradesco.jpg'
                )
            ],
            [
                'name' => 'Itau',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/logo-itau.jpg'),
                    'logo-itau.jpg'
                )
            ],
            [
                'name' => 'Banco do Brasil',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/logo-bb.jpg'),
                    'logo-bb.jpg'
                )
            ],
            [
                'name' => 'Santander',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/logo-santander.jpg'),
                    'logo-santander.jpg'
                )
            ]
        ];
    }
}
