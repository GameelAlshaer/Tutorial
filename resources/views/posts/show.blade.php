<html>
    <body>
       <h1> {{ $post->title }}</h1>
       <p>{{ $post->body }}</p>

       <div style="text-align:right">
        <p>
            {{$post->author }}
        </p>
       </div>
    </body>
</html>
