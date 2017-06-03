@extends('layouts.estandar')

@section('content')
<div>
   <h1>Contenido</h1>
   <hr>
   <p>Se define contenido</p>
</div>
@endsection()

@section('footer')
<div>
   <h1>Pie</h1>
   <hr>
   <p>Se define pie</p>
</div>
@endsection()

@section('formulario')
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection()