<div>
    <form method="POST" action="{{ url('/form/upload') }}" enctype="multipart/form-data">
        <input type="file" name="myfile" />
        {{ csrf_field() }}
        <button>Submit</button>
    </form>
</div>
<div>
<img src="{{ asset('/images/myimage.png') }}"/>
</div>