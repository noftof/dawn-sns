    {!! Form::open(['url'=> '/post/edit']) !!}
    <div class="form-group">
    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'uppost', 'autocomplete' => 'off']) !!}
  </div>
  <button type="submit" class="postbtn"><img src="images/edit.png" alt="Postする"></button>
    {!! Form::close() !!}
