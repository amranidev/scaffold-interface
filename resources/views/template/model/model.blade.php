namespace App;

use Illuminate\Database\Eloquent\Model;

class {{$names->TableName()}} extends Model
{

    public $timestamps = false;

    protected $table = '{{$names->TableNames()}}';

	@foreach($foreignKeys as $key)

	public function {{lcfirst(str_singular($key))}}()
	{
		return $this->belongsTo('App\{{ucfirst(str_singular($key))}}');
	}

	@endforeach

}
