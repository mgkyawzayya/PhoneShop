@extends('layouts.dashboard')
@section('content')
<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
    <div class="logo">
      <a href="#" class="simple-text logo-normal">
        Phone Shop
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="material-icons">assessment</i>
            <p>Daily Sales</p>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/products') }}">
            <i class="material-icons md-dark">shopping_cart</i>
            <p>Product List</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/records') }}">
            <i class="material-icons">assignment</i>
            <p>Montly Sales</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/services') }}">
            <i class="material-icons">assignment</i>
            <p>Services</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="/">Dashboard</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
          @if (count($errors) > 0)
          <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
          </div>
          @endif
  
          @if(session('success'))
          <div class="alert alert-success">
          {{ session('success') }}
          </div>
          @endif
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Product</h4>
                </div>
                <div class="card-body">
                  <form action="{{ url('product/store') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter Product Name</label>
                          <input type="text" name="name" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter Qty</label>
                          <input type="number" name="qty" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter Price</label>
                          <input type="number" name="price" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter ItemCode</label>
                          <input type="number" name="itemcode" class="form-control">
                        </div>
                      </div>
                    </div>
                    <?php date_default_timezone_set('Asia/Rangoon'); ?>
                    <input type="hidden" name="time" value="{{ date('Y-m-d H:i:s') }}" class="form-control">
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>     
  </div>
@endsection