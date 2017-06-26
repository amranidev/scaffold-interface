use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class {{ucfirst($first)}}{{ucfirst($second)}} extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{str_singular($first)}}_{{str_singular($second)}}',function (Blueprint $table){
			$table->increments('id')->unique()->index()->unsigned();
			$table->integer('{{str_singular($first)}}_id')->unsigned()->index();
			$table->foreign('{{str_singular($first)}}_id')->references('id')->on('{{$first}}')->onDelete('cascade');
			$table->integer('{{str_singular($second)}}_id')->unsigned()->index();
			$table->foreign('{{str_singular($second)}}_id')->references('id')->on('{{$second}}')->onDelete('cascade');
			/**
			 * Type your addition here
			 *
			 */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('{{str_singular($first)}}_{{str_singular($second)}}');
    }
}
