@extends('layout')
@section('content')
    <div class="container">


        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center productlist">

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $.ajax({
            url: "{{ route('getProducts') }}",
            // cache: false,
            type: "GET",
            success: function(data) {

                data.forEach(element => {

                    $(".productlist").append(
                        `<div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">${element.name}</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">$ ${element.price}<small class="text-body-secondary fw-light"></small>
                                    </h1>
                                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Add to Cart</button>
                                </div>
                            </div>
                        </div>`
                    )


                });
                // $("#results").append(html);
            },
            'error': function(request, error) {
                alert("Request: " + JSON.stringify(request));
            }
        });
    </script>
@stop
