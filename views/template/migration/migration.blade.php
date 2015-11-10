use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class {{$TableName}} extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{$TableNames}}',function (Blueprint $table){
              $table->increments('id');<?php $i = 0?>
        @foreach($dataS as $attr)

		      $table->{{$dataM[$i]}}('{{$attr}}');<?php $i = $i + 1?>
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
        Schema::drop('{{$TableNames}}');
     }
}
