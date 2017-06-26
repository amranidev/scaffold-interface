<?php

namespace Amranidev\ScaffoldInterface\Parsers;

/**
 * Class Parser.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Parser
{
    /**
     * Parser data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create new Parser instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->data = $request;
    }

    /**
     * Get the entity name singular.
     *
     * @return string
     */
    public function singular()
    {
        return str_singular(str_slug($this->data['TableName'], '_'));
    }

    /**
     * Get the entity name plural.
     *
     * @return string
     */
    public function plural()
    {
        return str_plural(str_slug($this->data['TableName'], '_'));
    }

    /**
     * Uppercase-ing the first charechter in the entity name.
     *
     * @return string
     */
    public function upperCaseFirst()
    {
        return ucfirst($this->singular());
    }

    /**
     * Get Template.
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->data['template'];
    }

    /**
     * Parse template specification.
     *
     * @throws Exception
     *
     * @return string
     */
    public function getParse()
    {
        if (starts_with($this->data['template'], 'boot')) {
            return 'Bt';
        } else {
            return 'Mt';
        }

        throw new \Exception('Template Error');
    }
}
