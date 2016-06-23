<header class="top-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 header-bar">
            <div class="logo">
              <img src="{{url('/')}}/public/images/logo.png" class="img-responsive">
            </div>
            <div class="navigation">
              <nav class="navbar navbar-default nav-tabs">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li role="presentation"><a href="home.html">Home</a></li>
                      <li role="presentation"><a href="#">Edit Information</a></li>
                      <li role="presentation"><a href="#">NYC Pick-UP </a></li>
                      <li role="presentation"><a href="#">My Pick-UP </a></li>
                      <li role="presentation"><a href="#">Prices</a></li>
                      <li role="presentation"><a href="neighbour.html">Neighborhoods</a></li>
                      <li role="presentation"><a href="faq.html">FAQs</a></li>
                      <li role="presentation"><a href="#">Contact</a></li>

                      <li><a href="tel:8009595785">(800) 959-5785</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                      <li role="presentation" class="welcome-user"><a href="#">Welcome <span>mitchell clerk</span></a>
                        <ul>
                          <li role="presentation"><a href="">My Profile</a></li>
                        </ul>
                      </li>
                      <li><a href="{{route('getLogout')}}"><span class="glyphicon glyphicon-off logout" aria-hidden="true" title="Logout"></span></a></li>
                    </ul>
                
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>
            </div>
          </div>
        </div>
    </div>
  </header>