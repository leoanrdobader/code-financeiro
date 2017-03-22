<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankLogoDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $logo = new \Illuminate\Http\UploadedFile(
            storage_path('app/files/banks/logos/logo-carteira.jpg'),
            'logo-carteira.jpg'
        );
        $name = env('BANK_LOGO_DEFAULT');
        $destFile = \CodeFin\Models\Bank::logosDir();

        Storage::disk('public')->putFileAs($destFile, $logo, $name);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $path = \CodeFin\Models\Bank::logosDir();
        $dir = dir(Storage::disk('public')->getAdapter()->getPathPrefix().$path);

        while($file = $dir->read()){
            switch ($file){
                case ".":
                case "..":
                    break;
                default:
                    Storage::disk('public')->delete($path.'/'.$file);
                    break;
            }
        }
        $dir -> close();
    }
}
