@props(['categ'])
<div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="d-flex align-items-center">
            <div class="site-logo">
              <a href="{{ route('home') }}" class="d-block">
                <img src="images/logo.jpg" alt="Image" class="img-fluid">
              </a>
            </div>
            <div class="mr-auto">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li class="active">
                    <a href="{{ route('home') }}" class="nav-link text-left"><span class="icon-home mr-2"></span></a>
                  </li>
                  @foreach($categ as $data)
                  <li class="has-children">
                    <a href="#" class="nav-link text-left">{{$data['nom']}}</a>
                    
                    <ul class="dropdown" >
                      @if(count($data['formation'])>0)
                      @foreach($data['formation'] as $formation)
                      <li><a href="course-single.html">{{$formation['titre']}}</a></li>
                      @endforeach
                      @else
                      <li><a>aucune formation</a></li>
                      @endif
                    </ul>
                    
                  </li>
                 
                  @endforeach
                  <li>
                    <a href="{{ route('courses') }}" class="nav-link text-left">Certificats</a>
                  </li>
                </ul>                                                                                                                                                                                                                                                                                          </ul>
              </nav>
            </div>
            <div class="ml-auto">
              <div class="social-wrap">
                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                  class="icon-menu h3"></span></a>
              </div>
            </div>
           
          </div>
        </div>
        
        </header>
</div>