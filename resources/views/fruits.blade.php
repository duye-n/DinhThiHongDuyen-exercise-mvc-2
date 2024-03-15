<h2>Here are all the fruits:</h2>
<ul>
    @foreach ($data as $fruit)
    <li>{{$fruit->name}} costs {{$fruit->price}} $</li>
    @endforeach
</ul>