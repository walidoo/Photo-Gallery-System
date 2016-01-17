
 <h1>User Profile</h1>

            @foreach ($data as $key=>$value)
             <b>First Name :</b> <span class="ff">{{ $value['firstname'] }}</span></br> 
             <b>First Name :</b>  <span class="ff">{{ $value['lastname'] }}</span></br> 
             <b>First Name :</b> <span class="ff">{{ $value['email'] }}</span></br> 
               {{ HTML::image('public/imgprofile/'.$value["imgprofile"], $alt="ImgProfile", $attributes = array('width' => 150 , 'height' => 150 , 'class' => 'pvv img-circle')) }}<br>
             <b><p class="name_profile">{{$value['firstname']}} {{$value['lastname']}} </p></b>
                @endforeach



        <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Photo Gallery</h1>
            </div>
            @if(is_null($users))
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <b>
               No Photo Found
                </b>
            	</div>
            @else
               @foreach ($users as $key=>$value)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <!-- <a class="thumbnail big" href="public/photogallery/{{$value['user_id']}} {{$value['photo']}}" data-lightbox="roadtrip"> -->
               <a class="thumbnail big" href="http://localhost/wr/public/photogallery/{{$value['user_id']}} {{$value['photo']}}" data-lightbox="roadtrip" >
               {{ HTML::image('public/photogallery/'.$value['user_id']." ".$value['photo'], $alt="photogallery", $attributes = array('width' => 300 , 'height' => 400)) }}
                </a>
            </div>
              @endforeach
            @endif
        </div>

        <hr>

    </div>
