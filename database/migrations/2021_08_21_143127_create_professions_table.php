<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Specaility;
class CreateProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->string('title_en', 45);
            $table->string('title_ar', 45);
            $table->string('description_en', 100)->nullable();
            $table->string('description_ar', 100)->nullable();
            $table->boolean('active')->default(true);
            $table->foreignIdFor(Specaility::class);
            $table->foreign('specaility_id')->references('id')->on('specailities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professions');
    }
}
