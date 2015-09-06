<?php


namespace Bugs\Views;


use Illuminate\Support\Facades\Request;
use liphte\tags\html\Tag;

class LoginView
{

    public function layout()
    {

        $layout = new Layout();
        $t = $layout->getTag();

        $buttons = array(
            trans('auth.signin') => 'btn-success',
            trans('auth.signin.facebook') => 'btn-primary',
            trans('auth.signin.google') => 'btn-danger'
        );

        $layout->setContent(

            $t->div(['class' => 'card card-container'],
                [
                    $t->img(
                        [
                            'id' => 'profile-img',
                            'class' => 'profile-img-card',
                            'src' => asset('img/bugsit.png')
                        ]
                    ),
                    $t->p(['id' => 'profile-name', 'class' => 'profile-name-card']),
                    $t->form(['class' => 'form-signin'],
                        [
                            $t->span(['id' => 'reauth-email', 'class' => 'reauth-email']),
                            $t->input(
                                [
                                    'type' => 'email',
                                    'id' => 'inputEmail',
                                    'class' => 'form-control',
                                    'placeholder' => 'Email address',
                                    'required' => 'required',
                                    'autofocus' => 'autofocus'
                                ]
                            ),
                            $t->input(
                                [
                                    'type' => 'password',
                                    'id' => 'inputPassword',
                                    'class' => 'form-control',
                                    'placeholder' => 'Password',
                                    'required' => 'required'
                                ]
                            ),
                            $t->div(['id' => 'remember', 'class' => 'checkbox'],
                                [
                                    $t->label(
                                        [
                                            $t->input(['type' => 'checkbox', 'value' => 'remember-me'],
                                                trans('auth.remember.me')
                                            )
                                        ]
                                    )
                                ]
                            ),
                            $this->renderLoginButtons($buttons, $t),
                            $t->a(
                                [ 'href' => '#', 'class' => 'forgot-password'],
                                trans('auth.forgot.password')
                            )
                        ]
                    )
                ]
            )
        );

        return $layout;
    }

    private function renderLoginButtons( $buttons, Tag $t ) {

        $renderedButtons = array();

        foreach( $buttons as $key => $button ) {
            array_push(
                $renderedButtons,
                $t->button(
                    [
                        'class' => "btn btn-lg $button btn-block btn-signin",
                        'type' => 'submit'
                    ],
                    $key
                )
            );
        }

        return implode("", $renderedButtons);
    }
}