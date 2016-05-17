@extends('admin.layouts.admin-app')

@section('content')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('admin.includes.header')
  @include('admin.includes.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <section class="content">
        @yield('content')

    </section>
  </div>
  @include('admin.includes.footer')
  @include('admin.includes.controlsidebar')
</div>
@endsection