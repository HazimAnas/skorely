{!! Form::open(array('url' => '/program/teams', 'class' => 'form-inline')) !!}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
  </div>
  <button type="submit" class="btn btn-success">Add Team</button>
{!! Form::close() !!}
