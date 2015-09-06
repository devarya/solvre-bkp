<?php


namespace Bugs\Views;


use Bugs\Views\Base\LayoutBase;
use Illuminate\Http\Request;
use liphte\tags\html\Tag;

class Layout extends LayoutBase
{

    private function head(Tag $t, $controllerName)
    {
        return $t->head(
            [
                $t->meta(['charset' => 'utf-8']),
                $t->meta(['content' =>'IE=Edge', 'http-equiv'=> "X-UA-Compatible"]),
                $t->meta(['name' => 'viewport', 'content'=> "width=device-width, initial-scale=1"]),

                $t->title('Bugs - ' . trans('layout.title')),

                $t->link(
                    [
                        'rel' => 'icon',
                        'type' => 'image/png',
                        'href' => asset('img/favicon.png')
                    ]
                ),
                $t->link(
                    [
                        'rel' => 'stylesheet',
                        'href' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'
                    ]
                ),
                $t->link(
                    [
                        'rel' => 'stylesheet',
                        'href' => asset('css/layout.css')
                    ]
                ),
                $t->link(
                    [
                        'rel' => 'stylesheet',
                        'href' => asset('css/' . $controllerName . '.css')
                    ]
                ),

                $t->script(
                    ['src' => 'http://code.jquery.com/jquery-2.1.4.min.js']
                ),
                $t->script(
                    ['src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js']
                ),
                $this->getAdditionalJs()
            ]
        );

    }

    private function body(Tag $t)
    {

        return $t->body(
            $t->div(['class'=>'container'],
                    $this->getContent()
                )
        );

    }

    public function render(Request $request)
    {
        $t = $this->t;

        $path = $request->path();
        if( $path === '/' ) {
            $path = 'login/index';
        }
        ///** @noinspection PhpUndefinedMethodInspection */
        $controllerName = explode("/", $path)[0];

        $layout =
            $t->html(['lang' => 'pl'],
                [
                    $this->head($t, $controllerName),
                    $this->body($t)
                ]
            );

        return $layout;
    }


}