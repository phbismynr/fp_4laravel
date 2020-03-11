<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRelationMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned()->change();
            $table->foreign('role_id')->references('id')->on('roles')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function(Blueprint $table) {
            $table->dropForeign('mahasiswas_role_id_foreign');
            $table->dropIndex('mahasiswas_role_id_foreign');
            $table->unsignedBigInteger('role_id')->change();
        });
    }
}
