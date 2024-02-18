@extends('_layouts.default')
{{-- <link rel="stylesheet" href="{{asset('css/app.css')}}" /> --}}
@section('content')
<link rel="stylesheet" href="{{asset('css/chat.css')}}" />
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
        <div class="app">
            <header>
              <h1>Chat Application</h1>
              <input type="text" name="username" id="username" placeholder="Username">
            </header>
            <div id="messages"></div>
            <form action="" id="message_form">
              <input type="text" name="message" id="message_input" placeholder="Message"/>
              <button type="submit" id="message_send">Send</button>
            </form>
        </div>
    </div>
  </section>
<div>
<script src="{{asset('js/chatpusher.js')}}"></script>
@endsection
