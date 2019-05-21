<div class="topbar">
    <div class="container d-flex">

      <!-- service contact -->
      <nav class="nav d-none d-md-flex"> <!-- hidden on xs -->
        <a class="nav-link pl-0" href="javascript:void(0)"><i data-feather="phone"></i> 212 123 456 789</a>
        <a class="nav-link" href="javascript:void(0)"><i data-feather="mail"></i> support@mimity.com</a>
      </nav>

      <!-- social media -->
      <nav class="nav">
        <a class="nav-link pr-2 pl-0" href="javascript:void(0)"><i data-feather="facebook"></i></a>
        <a class="nav-link px-2" href="javascript:void(0)"><i data-feather="twitter"></i></a>
        <a class="nav-link px-2" href="javascript:void(0)"><i data-feather="instagram"></i></a>
      </nav>

      <!-- language -->
      <nav class="nav nav-lang ml-auto"> <!-- push it to the right -->
        <a class="nav-link active" href="{{ route('login')}}">Login</a>
        <a class="nav-link pipe">|</a>
        <a class="nav-link" href="{{ route('register')}}">Register</a>
      </nav>

      <!-- User dropdown -->
      <ul class="nav">
        <li class="nav-item dropdown dropdown-hover">
          <a class="nav-link dropdown-toggle pr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i data-feather="user"></i> Hi, John <i data-feather="chevron-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="media p-1 align-items-center mb-2">
              <img src="{{ asset('assets/front-end/img/') }}/user/user.svg" alt="user" class="img-thumbnail rounded-circle mr-2 size50x50">
              <div class="media-body">
                <strong>John Thor</strong>
                <div class="small counter">1113 points</div>
              </div>
            </div>
            <a href="account-orders.html" class="dropdown-item has-icon"><i data-feather="shopping-cart"></i>My Orders</a>
            <a href="account-wishlist.html" class="dropdown-item has-icon has-badge"><i data-feather="heart"></i>Wishlist <span class="badge rounded badge-primary">2</span></a>
            <a href="account-profile.html" class="dropdown-item has-icon"><i data-feather="settings"></i>Account Setting</a>
            <div class="dropdown-divider"></div>
            <a href="account-login.html" class="dropdown-item has-icon text-danger"><i data-feather="log-out"></i>Logout</a>
          </div>
        </li>
      </ul>
      <!-- /User dropdown -->

    </div><!-- /.container -->
  </div>