@extends('layouts.app')
@section('content')
    <div class="skewed-bg">
    <div class="content" id="users">
        <h1 class="title">ChatApp! <br>
        Users Connected (@{{users.length}})</h1>
     <p class="text">Well, i have no idea what to put here.</p>
         <div class="chat-app">
        <div class="chat-online">
            <div class="chat-message">
    <b v-for="message in messages"> @{{message.user}} : @{{message.message}}</b><br>
                <notifications />
            </div>
            <div class="chat-input">
                <form @keyup.enter.prevent.stop="send">
                     {{ csrf_field() }}
                <textarea id="text" name="msg" v-model="msg" rows="1"></textarea>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<footer class="footer">
    <p class="credits">
        THE PURPOSE WAS TO UNDERSTAND AND WRAP MY MIND ARROUND THE SKEW CSS TRANSFORMATION
  </p>
</footer>
@stop
{{-- @submit.prevent="send" --}}
<script type="text/javascript">
    
</script>