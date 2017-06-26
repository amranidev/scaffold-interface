    /**
     * {{str_singular($model)}}.
     *
     * @return \Illuminate\Support\Collection;
     */
    public function {{str_plural($model)}}()
    {
        return $this->belongsToMany('{{ config('amranidev.config.modelNameSpace') }}\{{ucfirst(str_singular($model))}}');
    }

    /**
     * Assign a {{str_singular($model)}}.
     *
     * @param ${{str_singular($model)}}
     * @return mixed
     */
    public function assign{{ucfirst(str_singular($model))}}(${{str_singular($model)}})
    {
        return $this->{{str_plural($model)}}()->attach(${{str_singular($model)}});
    }
    /**
     * Remove a {{str_singular($model)}}.
     *
     * @param ${{str_singular($model)}}
     * @return mixed
     */
    public function remove{{ucfirst(str_singular($model))}}(${{str_singular($model)}})
    {
        return $this->{{str_plural($model)}}()->detach(${{str_singular($model)}});
    }
