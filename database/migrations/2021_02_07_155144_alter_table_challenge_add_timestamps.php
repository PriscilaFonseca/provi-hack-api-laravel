<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableChallengeAddTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenge', function (Blueprint $table) {
            $table->timestamps();
            $table->string('id_area_expertise',45)->change();
            $table->tinyInteger('status')->after('id_area_expertise')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenge', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->integer('id_area_expertise')->change();
            $table->dropColumn('status');
        });
    }
}
