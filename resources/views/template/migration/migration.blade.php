use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class {{ucfirst($parser->plural())}}.
 *
 * @author The scaffold-interface created at {{date("Y-m-d h:i:sa")}}
 * @link https://github.com/amranidev/scaffold-interface
 */
class {{studly_case(ucfirst($parser->plural()))}} extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{$parser->plural()}}',function (Blueprint $table){

        $table->increments('id');<?php $i = 0;?>

        @foreach($dataSystem->dataScaffold('v') as $attr)

        $table->{{$dataSystem->dataScaffold('migration')[$i]}}('{{$attr}}');<?php $i = $i + 1;?>

        @endforeach

        /**
         * Foreignkeys section
         */
        @foreach($dataSystem->getForeignKeys() as $key)

        $table->integer('{{lcfirst(str_singular($key))}}_id')->unsigned()->nullable();
        $table->foreign('{{lcfirst(str_singular($key))}}_id')->references('id')->on('{{$key}}')->onDelete('cascade');
        @endforeach

        @if($dataSystem->isTimestamps())

        $table->timestamps();
        @endif

        @if($dataSystem->isSoftdeletes())

        $table->softDeletes();
        @endif

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
        Schema::drop('{{$parser->plural()}}');
    }
}
