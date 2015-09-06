<?php


namespace Bugs\Views\Base;


use Illuminate\Http\Request;
use liphte\tags\html\Tag;

abstract class LayoutBase
{
    protected $t;
    private $content;
    private $additionalJs;

    function __construct()
    {
        $this->t = new Tag();
        $this->content = null;
        $this->additionalJs = array ();
    }

    abstract public function render(Request $request);

    public function setContent($content)
    {

        $this->content = $content;
    }

    public function addJs($scriptPath)
    {

        array_push($this->additionalJs, $scriptPath);
    }

    public function addAllJs($scriptPaths)
    {

        array_merge($this->additionalJs, $scriptPaths);
    }

    public function getAdditionalJs()
    {

        $scripts = array();

        foreach( $this->additionalJs as $path ) {
            array_push( $scripts, $this->t->script(['src'=>asset('js/' . $path)]) );
        }

        return implode("", $scripts);
    }

    protected function getContent() {
        return $this->content;
    }

    public function getTag() {
        return $this->t;
    }

}