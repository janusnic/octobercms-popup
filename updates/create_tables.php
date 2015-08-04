<?php namespace Ebussola\Popup\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePopupsTable extends Migration
{

    public function up()
    {
        Schema::create('ebussola_popup_layouts', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->longText('content');
        });


        Schema::create('ebussola_popup_popups', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('name');

            $table->enum('content_type', ['imageUrl', 'imageUpload', 'page', 'markdown']);
            $table->string('content_image_url')->nullable();
            $table->string('content_image_upload')->nullable();
            $table->string('content_page')->nullable();
            $table->string('content_markdown')->nullable();
            $table->string('content_link')->nullable();

            $table->unsignedInteger('layout_id')->nullable();
            $table
                ->foreign('layout_id')
                ->references('id')
                ->on('ebussola_popup_layouts')
                ->onDelete('set null')
            ;

            $table->dateTime('date_start');
            $table->dateTime('date_end');

            $table->json('target');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ebussola_popup_popups');
        Schema::dropIfExists('ebussola_popup_layouts');
    }

}
