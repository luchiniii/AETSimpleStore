@extends('layouts.app')

@section('content')
<product-public-show-component product-id="{{ $productId }}"></product-public-show-component>
@endsection
