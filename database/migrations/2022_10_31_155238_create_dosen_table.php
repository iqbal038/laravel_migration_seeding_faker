<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $field=[];

    public function new($tableName, $field){
        $this->field = $field;
        Schema::table($tableName, function(Blueprint $table) {
            foreach($this->field as $dataField):
            $table->string($dataField);
            endforeach;
        });
    }

    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->char('nidn', 10);
            $table->string('nama', 50);
            $table->timestamps();
            $table->primary('nidn');
        });

        if(!Schema::hasColumn('dosen', 'nidn') && !Schema::hasColumn('dosen', 'nama')) {
            $tableName = 'dosen';
            $dataField = [
                "nidn",
                "nama"
            ];
            $this->new($tableName, $dataField);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen');
    }
};
