<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow bg-dark">
  <h3 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">.::Retro Cinema</a></h3>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-white" href="/">Movies</a>
    <a class="p-2 text-white" href="/posts">Posts</a>
  </nav>
  @if(!Auth::check())
    <a class="btn btn-light" href="/register">Register</a> |
    <a class="btn btn-light" href="/login">Sign In</a>
  @else
    <a href="/home">{{ Auth::user()->name }}</a> |
    <a class="btn btn-light" href="/logout">Logout</a>
  @endif()
</div>
