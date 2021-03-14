
<p>
    {!! Form::text('title', null, [ 'placeholder' => 'Title', 'required' => true ]) !!}
</p>

<p>
    {!! Form::text('year', null, [ 'placeholder' => 'Year', 'required' => true]) !!}
</p>

<p>
    {!! Form::text('gross', null, [ 'placeholder' => 'Gross', 'required' => true]) !!}
</p>

<p>
    @include('_partials.select', ['submit' => false])
</p>

<p>
    {!! Form::textarea('summary', null, ['placeholder' => 'About this movie', 'required' => true]) !!}
</p>
<h4 class="select-genre">Select genre +</h4>
<p>
    @foreach($genres as $genre)
        <label class="checkbox">
            {!! Form::checkbox('genres[]', $genre->id) !!}
            {{ $genre->genre }}
        </label>
    @endforeach

</p>






