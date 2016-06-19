namespace {{config('amranidev.config.modelNameSpace')}};

use Illuminate\Database\Eloquent\Model;

/**
 * Class {{$names->tableName()}}Controller
 *
 * @author The scaffold-interface created at {{date("Y-m-d h:i:sa")}}
 * @link https://github.com/amranidev/scaffold-interface
 */
class {{$names->tableName()}} extends Model
{
    public $timestamps = false;

    protected $table = '{{$names->tableNames()}}';

	@foreach($foreignKeys as $key)

	public function {{lcfirst(str_singular($key))}}()
	{
		return $this->belongsTo('{{config('amranidev.config.modelNameSpace')}}\{{ucfirst(str_singular($key))}}','{{lcfirst(str_singular($key))}}_id');
	}

	@endforeach

}
