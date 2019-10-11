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
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/products') }}">
            <i class="material-icons md-dark">shopping_cart</i>
            <p>Product List</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/records') }}">
            <i class="material-icons">assignment</i>
            <p>Monthly Sales</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/services') }}">
            <i class="material-icons">settings</i>
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
          @if(session('success'))
          <div class="alert alert-success">
          {{ session('success') }}
          </div>
          @endif
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-3">
              <a href="/product/create" class="btn btn-success">New</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title mt-0">လက်ကျန်ပစ္စည်းစာရင်း</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Qty
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        ItemCode
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                          <td class="text-center">
                            {{ $product->name }}
                          </td>
                          <td class="text-center">
                            {{ $product->qty }}
                          </td>
                          <td class="text-center">
                            {{ $product->price }}
                          </td>
                          <td class="text-center">
                            {{ $product->itemcode }}
                          </td>
                          <td class="td-actions text-center">
                            <div class="row">
                              <a href="{{ url('/product/edit/' . $product->id) }}" class="btn btn-success btn-round">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{ url('/product/destroy/' . $product->id) }}" method="post">
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
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0">ကုန်နေသောပစ္စည်းစာရင်း</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class=" text-primary">
                      <th>
                        အမည်
                      </th>
                      <th>
                        အရေအတွက်
                      </th>
                      <th>
                        ဈေးနှုန်း
                      </th>
                      <th>
                        ကုဒ်
                      </th>
                      <th>
                        ပြုပြင်ရန်
                      </th>
                    </thead>
                    <tbody>
                        @foreach($runouts as $product)
                        <tr>
                          <td>
                            {{ $product->name }}
                          </td>
                          <td>
                            {{ $product->qty }}
                          </td>
                          <td>
                            {{ $product->price }}
                          </td>
                          <td>
                            {{ $product->itemcode }}
                          </td>
                          <td class="td-actions">
                            <div class="row">
                              <a href="{{ url('/product/edit/' . $product->id) }}" class="btn btn-success btn-round">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{ url('/product/destroy/' . $product->id) }}" method="post">
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