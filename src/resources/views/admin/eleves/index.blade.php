@extends('home')

@section('main-content')

@if (Session::get('success'))
<script type="text/javascript">
    One.helpers("notify", {type: "success", icon: "fa fa-check mr-1", message: "{{ Session::get('success') }}"});
</script>
@endif

@if (Session::get('error'))
<script type="text/javascript">
    One.helpers("notify", {type: "error", icon: "fa fa-check mr-1", message: "{{ Session::get('error') }}"});
</script>
@endif



@endsection
