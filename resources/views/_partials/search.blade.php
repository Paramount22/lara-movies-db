{!! Form::open(array('url' => 'queries', 'method' => 'get', 'class'=>'form navbar-form navbar-right searchform')) !!}
{!! Form::text('search', null,
                       array('required' => true,
                            'class'=>'form-control',
                            'placeholder'=>'Search field')) !!}
{!! Form::submit('Search',
                           array('class'=>'btn btn-default')) !!}
{!! Form::close() !!}
