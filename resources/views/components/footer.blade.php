@props(['datas'])
@php
$ecole = App\Models\Ecole::first();

@endphp
<div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <p class="mb-4">
            @if(!empty($ecole->logo))
            <img src="/Ecolelogo/{{ $ecole->logo }}" alt="Image" class="img-fluid" />
            @endif
          </p>
         
        </div>
        <!---------------------------modification abdo------------------------------->
        <div class="col-lg-3">
          <h3 class="footer-heading"><span>Nos Certifications</span></h3>
          <ul class="list-unstyled">
            @foreach ($datas as $categ)
            <li><a href="#">{{$categ['nom']}}</a></li>

            @endforeach

          </ul>
        </div>
        <!--------------------------------------------------------------------------->
        <div class="col-lg-3">
          <h3 class="footer-heading"><span>Contact</span></h3>
          <ul class="list-unstyled">
            <li><a href="{{$ecole->facebook}}">Facebook</a></li>
            <li><a href="{{$ecole->whatsapp}}">Whatsapp</a></li>
            <li><a href="{{$ecole->instagram}}"">Instagram</a></li>
            <li><a href="{{$ecole->email}}">{{$ecole->email}}</a></li>
            
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="copyright">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Droits d'auteur &copy;

              <script>
                document.write(new Date().getFullYear());
              </script>
              Tous droits réservés 
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>