@extends('layouts.app')

@section('content')
<product-show-component vendor-id={{ $vendorId }} product-id="{{ $productId }}"></product-show-component>
@endsection
