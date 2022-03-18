
<div class="col-md-12 show-list">

    <!-- Nom Field -->
    <div class="form-group nom">
            <h5 class="title-show-liste">Nom</h5>
            <p>{{ $liste->nom }} </p>
    </div>

    <!-- Frequence Field -->
    <div class="form-group frequence">
        <h5 class="title-show-liste">Frequence</h5>
        <p>{{ $liste->frequence }}</p>
    </div>

    <!-- Indication Field -->
    <div class="form-group indication">
        <h5 class="title-show-liste">Indication</h5>
        <p>{{ $liste->indication }}</p>
    </div>

    <!-- Emplacement Field -->
    <div class="form-group emplacement">
        <h5 class="title-show-liste">Emplacement</h5>
        <p>{{ $liste->emplacement }}</p>
    </div>

</div>


<div class="col-md-12 mt-3 liens">
    <h5 class="title-show-liste">Liens</h5>
    @foreach ($liste->liens as $lien)
        <a href="{{ $lien->url }}" target="_blank" class="btn btn-success mt-2">{{ $lien->nom }}</a>
    @endforeach
</div>


<div class="col-md-12 mt-3 photos">
    <h5 class="title-show-liste">Photos</h5>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            @php
                $i = 0;
            @endphp

            @foreach ($liste->photos as $photo)

                <div class="carousel-item @if($i == 0) active @endif" style="text-align: -webkit-center;">
                    <img style="height: 300px; width: auto;" class="d-block" src="/{{ $photo->url }}" alt="Photo {{ $photo->id }}}">
                </div>

                @php
                    $i++;
                @endphp

            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="background-color: rgba(0,0,0, .4);">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Prec.</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="background-color: rgba(0,0,0, .4);">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Suiv.</span>
        </a>
    </div>

</div>




