use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class {{$names->TableNames()}} extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{$names->TableNames()}}',function (Blueprint $table){

        $table->increments('id');<?php $i = 0;?>

        @foreach($dataSystem->dataScaffold('v') as $attr)

        $table->{{$dataSystem->dataScaffold('migration')[$i]}}('{{$attr}}');<?php $i = $i + 1;?>

        @endforeach

        /**
         * Foreignkeys section
         */
        @foreach($dataSystem->foreignKeys as $key)

        $table->integer('{{lcfirst(str_singular($key))}}_id')->unsigned();
        $table->foreign('{{lcfirst(str_singular($key))}}_id')->references('id')->on('{{$key}}');

        @endforeach

        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('{{$names->TableNames()}}');
     }
}
