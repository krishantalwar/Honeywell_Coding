@extends('layout')
@section('content')
    <form class="form-signin" action="{{ route('productstore') }}" method="post">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal"> Product Add</h1>
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" id="inputEmail" class="form-control" name="name" placeholder="name" required autofocus>

        <label for="inputEmail" class="sr-only">Description</label>
        <textarea type="text" id="inputEmail" name="description" class="form-control" placeholder="description" required>
        </textarea>

        <label for="inputPassword" class="sr-only">Quantity</label>
        <input type="number" id="inputPassword" class="form-control" name="quantity" placeholder="Quantity" required>

        <label for="inputPassword" class="sr-only">Price</label>
        <input type="number" id="inputPassword" class="form-control" name="price" placeholder="price" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
    </form>
@stop
