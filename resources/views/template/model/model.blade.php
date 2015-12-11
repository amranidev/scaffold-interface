namespace App;

use Illuminate\Database\Eloquent\Model;

class {{$TableName}} extends Model
{

    public $timestamps = false;

    protected $table = '{{$TableNames}}';

	@foreach($foreignKeys as $key)

	public function {{lcfirst(str_singular($key))}}()
	{
		return $this->belongsTo('App\{{ucfirst(str_singular($key))}}');
	}

	@endforeach

}
