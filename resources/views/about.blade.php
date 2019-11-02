 <!-- ABOUT US Content -->
 <div class="container-fluid about-us max-w-large p-md-5">
        <div class="row d-flex justify-content-start about-us-bg ">
            <div class="col-sm-12 col-md-12 col-lg-7 col-xl-6 about-us-text ">
                <a name="aboutus"></a>
                <h1>ABOUT US</h1>
                <h5 class="gold">Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. </h5>
                @if(isset($aboutData['imageUrl']))
                <img src="{{$aboutData['imageUrl']}}"/> 
                @endif
                @if(isset($aboutData['text']))
                {!! $aboutData["text"] !!}   
                @else
                <p>Lorem ipsum dolor sit amet, convenire prodesset cotidieque mea ex. Commodo deseruisse per cu, cu dicant noster nec. Commodo deseruisse per cu, cu dicant noster nec. An detraxit intellegebat pri, at hendrerit constituto contentiones
                        vix, cum nemore moderatius cu. Iusto legendos inimicus ei mel. Sit no oporteat postulant. Harum munere legere qui ea, docendi moderatius duo eu, usu mucius splendide disputationi at. Eos autem debitis forensibus id, mea ne falli
                        graece.
                    </p>
                    <p>Ad omnis nobis malorum sed. Torquatos incorrupte disputationi est in. Commodo deseruisse per cu, cu dicant noster nec. Commodo deseruisse per cu, cu dicant noster nec. Vivendo civibus et vis. Vel scripta inermis denique ei, vim nibh
                        idque solet no. Tota omnium perfecto te his. Aeque doming sea in, paulo ubique iracundia his ne. Tempor invidunt id qui, pri facilisis imperdiet ei. Ex percipitur reformidans pri, eos ad utinam graeco, quo an minimum detracto interpretaris.
                    </p>
                    <p>Commodo deseruisse per cu, cu dicant noster nec. Ex percipitur reformidans pri, eos ad utinam graeco, quo an minimum detracto interpretaris. Quo ea lobortis accusamus. Accusam iracundia sed ex. Cu usu cetero scaevola fabellas. Id antiopam
                        intellegam vix, ea nam simul soluta repudiandae. Ex percipitur reformidans pri, eos ad utinam graeco, quo an minimum detracto interpretaris. </p>    
                @endif
                        
                </div>
        </div>
</div>
