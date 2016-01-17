
        <div class="container">
<div class=" row">
            <div class="col-lg-12">
                <h1 class="page-header">Users</h1>
            </div>
            @foreach ($users as $key=>$value)
                <!-- <td>{{{$value['firstname']}}}</td> -->
                <div class="col-md-3">
                {{ HTML::image('public/imgprofile/'.$value["imgprofile"], $alt="ImgProfile", $attributes = array('width' => 150 , 'height' => 150 , 'class' => 'rr img-circle')) }}
                <div class="ttcen"><b>{{ HTML::link('users/profile?pid='.$value['id'], $value['firstname'] ." ". $value['lastname'] , array($value['id'] ,'class' => 'anone')) }}</b></div>
                </div>
                @endforeach
</div>
</div>


