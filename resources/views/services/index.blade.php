@extends('layouts.dashboard')
@section('content')
<div class="sidebar" data-color="green" data-background-color="white" data-image="">
    <div class="logo">
      <a href="/" class="simple-text logo-normal">
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
        <li class="nav-item">
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
        <li class="nav-item active">
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
          <a class="navbar-brand" href="/">POS</a>
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
              <a class="nav-link" href="/" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="/">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-3">
              <a href="/sale/create" class="btn btn-success">New</a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title mt-0">Services List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="sale" class="table table-hover">
                    <thead class=" text-success">
                      <th>
                        Name
                      </th>
                      <th>
                        Model Name
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Time
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                          <td>
                            {{ $service->name }}
                          </td>
                          <td>
                            {{ $service->model }}
                          </td>
                          <td>
                            {{ $service->description }}
                          </td>
                          <td>
                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $service->created_at)->hour }}
                          </td>
                          <td class="td-actions">
                            <div class="row">
                              <a href="{{ url('/service/edit/' . $service->id) }}" class="btn btn-success btn-round">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{ url('/service/destroy/' . $service->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-danger btn-round" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="material-icons">delete</i>
                                </button>
                              </form>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>     
  </div>
@endsection