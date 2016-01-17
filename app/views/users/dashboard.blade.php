<h1>Dashboard</h1>
<p class="bg" >Welcome to your Dashboard. You rock!</p> {{ HTML::image('public/imgprofile/'.$users["imgprofile"], $alt="ImgProfile", $attributes = array('width' => 150 , 'height' => 150 , 'class' => 'vv img-circle')) }}<br>
<b><p id="name_profile" class="nameprofile" user-fname="{{$users['firstname']}}" user-lname="{{$users['lastname']}}">{{$users['firstname']}} {{$users['lastname']}} </p></b>
 <b>First Name :</b> <input type="text" class="fname edit-me" value="{{$users['firstname']}}" disabled="" /></br>
 <b>Last Name :</b>  <input type="text" class="lname edit-me" value="{{$users['lastname']}}" disabled="" /></br>
 <b>E-mail :</b> <input type="text" class="email edit-me" value="{{$users['email']}}" disabled="" /></br>
 <a curval="Edit" href="" id="editlink1">Edit</a>

{{ Form::open(array('url'=>'users/dashboard', 'class'=>'form-signup bbb' , 'files' => true)) }}
    <h2 class="form-signup-heading">Upload Your Photos</h2>
 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 
    {{ Form::file('img[]' , array('class'=>'bb form-control input-block-level','multiple' => 'true')) }}
 
    {{ Form::submit('Upload', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}


            <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Active</th>
                <th>Choose</th>
                <th>Delete</th>

            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Photo</th>
                <th>Active</th>
                <th>Choose</th>
                <th>Delete</th>

            </tr>
        </tfoot>
 
        
        @if($items)
        <tbody>
             
            @foreach ($items as $key=>$value)
            	<tr>
                <td>{{ HTML::image('public/photogallery/'.$value['user_id']." ".$value['photo'], $alt="photogallery", $attributes = array('width' => 70 , 'height' => 70 , 'class' => '')) }}</td>
                <td class="active" user-active="{{{ $value['active'] }}}">{{{ $value['active'] }}}</td>
                <td><select class="activity" user-id="{{ $value['id'] }}"><option {{{($value['active']=='yes')?'selected':''}}} value="yes">yes</option>
                <option {{{($value['active']=='no')?'selected':''}}} value="no">no</option></select>
                 </td>

                <td>
        		<button  class="btn btn-danger deletebutton" user-id="{{ $value['id'] }}">Delete</button>
                </td>
                </tr>
                @endforeach
        </tbody>
        @endif
        
        </table>