<?php
//
//   $selected = false;
//
//   if ( isset($director) ) $selected = $director->id;
//   elseif ( isset($movie) ) $selected = $movie->director_id;
//
//
//?>


<?php $dir_model = new \App\Director; ?>  {{--vytiahneme si director model --}}

<select name="director_id" onchange="{{ $submit ? 'this.form.submit()' : '' }}" required="">

    <option value="">All directors</option>
    @foreach( $dir_model->getDirectors() as $director)
        <option {{--$selected === $director->id ? 'selected' : ''--}}
                value="{{ $director->id }}">{{ $director->name }}
        </option>
    @endforeach
</select>
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
