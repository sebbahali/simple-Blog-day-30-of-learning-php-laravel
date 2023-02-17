@extends('ly')



@section('body')

<header>
  <h1>My simple Blog day 30 of learning php laravel </h1>
  
  @if(session('user_id'))
  <?php $user = \App\Models\User::find(session('user_id')) ?>
  <div class="user-info">
    <img src="{{ asset('storage/' . $user->path2) }}" width="200" height="100">
    <span>{{ $user->username }}</span>
  </div>
 @endif
</header>
  <main>
    <section id="create-post">
      <h2>Write a Post</h2>
      <form action="{{route('storeblog')}}" method="post" enctype='multipart/form-data'>
        @csrf
       
        @foreach ($users as $us)
    
        <input type="hidden" name="user_id" value="{{$us['id'] }}">
        @endforeach
        <label for="post-title">Title:</label>
        <input type="text" id="post-title" name="title">
        <label for="post-body">Body:</label>
        <textarea id="post-body" name="body"></textarea>
        <div class="form-group">
            <label for="file">add image </label>
            <input type="file"  name="image" >
        </div>
            
        <button type="submit">Post</button>
      </form>
    </section>
   
    @foreach ($posts as $post)
    <section id="posts">
      <h2>Recent Posts</h2>
      <ul id="posts-list">
        <li>
          <div class="post">
            
                
            
            <h3 class="post-title">{{$post->title}}</h3>
            <p class="post-body">{{$post->body}}</p>
            <p class="post-author">By {{ $post->user->username }}
                
                -{{$post['created_at']}} </p> 
                <td><img src="{{ asset('storage/' . $post->path) }}" width="800" height="300"></td>
            
                <ul class="comments-list">
                    @foreach ($post->comments as $comment)
                        <li>
                            <div class="comment">
                                <p class="comment-text">{{ $comment->cmnt }}</p>
                                <td><img src="{{ asset('storage/' . $comment->path1) }}" width="100" height="50"></td>

                           <p class="comment-author">Posted by {{ $comment->user->username }} on {{ $comment['created_at']->format('d M Y') }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            
            <h3 class="post-comments">Add a Comment</h3>
            <form action="{{route('cmntstore')}}" method="post" enctype='multipart/form-data'>
                @csrf
              <label for="comment-body">Comment:</label>
              <textarea id="comment-body" name="cmnt"></textarea>
              <input type="hidden" name="post_id" value="{{$post->id }}">
              @foreach ($users as $us)
            
    
              <input type="hidden" name="user_id" value="{{$us['id'] }}">
              @endforeach
              <div class="form-group">
                <label for="file">add image </label>
                <input type="file"  name="image" >
            </div>
              <button type="submit">Comment</button>
            </form>
            
          </div>
        </li>
      </ul>
    </section>
     
  </main>
  @endforeach 
 

  <footer>
    <p>Copyright &copy; 2023</p>
  </footer>
     


@endsection