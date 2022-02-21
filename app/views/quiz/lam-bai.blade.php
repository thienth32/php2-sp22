<h2>{{$quiz->name}}</h2>
<p>Thời gian: {{$quiz->duration_minutes}} phút</p>
<hr>
@foreach ($questions as $item)
<fieldset>
    <legend>Câu hỏi {{$loop->iteration}}: {{$item->name}}</legend>
    <ul>
        @foreach ($item->answers as $ans)
            <li>{{$ans->content}}</li>
        @endforeach
    </ul>
</fieldset>    
@endforeach
