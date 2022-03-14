@extends('layouts.app')

@section('content')
<product-public-index-component vendor-id="{{ $vendorId }}"></product-public-index-component>
@endsection
