<style>
	@use postcss-preset-env; {
  stage: 0;
}

body {
  background: #e9e9e9;
  color: #9a9a9a;
  font-family: Droid Sans, sans-serif;
  line-height: 1.5;
  margin: 0;
}

a {
  text-decoration: none;
}

fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}

h4,
h5 {
  line-height: 1.5em;
  margin: 0;
}

hr {
  background: #e9e9e9;
  border: 0;
  box-sizing: content-box;
  height: 1px;
  margin: 0;
  min-height: 1px;
}

img {
  border: 0;
  display: block;
  height: auto;
  max-width: 100%;
}

input {
  border: 0;
  color: inherit;
  font-family: inherit;
  font-size: 100%;
  line-height: normal;
  margin: 0;
}

p {
  margin: 0;
}

.onchats {
  *zoom: 1;
} /* For IE 6/7 */
.onchats:before,
.onchats:after {
  content: "";
  display: table;
}
.onchats:after {
  clear: both;
}

/* ---------- LIVE-CHAT ---------- */

#live-chat {
  bottom: 0;
  font-size: 12px;
  right: 24px;
  position: fixed;
  width: 300px;
}

#live-chat header {
  background: #293239;
  border-radius: 5px 5px 0 0;
  color: #fff;
  cursor: pointer;
  padding: 16px 24px;
}

#live-chat h4:before {
  background: #1a8a34;
  border-radius: 50%;
  content: "";
  display: inline-block;
  height: 8px;
  margin: 0 8px 0 0;
  width: 8px;
}

#live-chat h4 {
  font-size: 12px;
}

#live-chat h5 {
  font-size: 10px;
}

#live-chat form {
  padding: 24px;
}

#live-chat input[type="text"] {
  border: 1px solid #ccc;
  border-radius: 3px;
  padding: 8px;
  outline: none;
  width: 234px;
}

.chat-message-counter {
  background: #e62727;
  border: 1px solid #fff;
  border-radius: 50%;
  display: none;
  font-size: 12px;
  font-weight: bold;
  height: 28px;
  left: 0;
  line-height: 28px;
  margin: -15px 0 0 -15px;
  position: absolute;
  text-align: center;
  top: 0;
  width: 28px;
}

.chat-close {
  background: #1b2126;
  border-radius: 50%;
  color: #fff;
  display: block;
  float: right;
  font-size: 10px;
  height: 16px;
  line-height: 16px;
  margin: 2px 0 0 0;
  text-align: center;
  width: 16px;
}

.chat {
  background: #fff;
}

.chat-history {
  height: 252px;
  padding: 8px 24px;
  overflow-y: scroll;
}

.chat-message {
  margin: 16px 0;
}

.chat-message img {
  border-radius: 50%;
	}
}
</style>

<div id="live-chat">

	<header class="onchats">
  
	  <a href="#" class="chat-close">x</a>
  
	  <h4>John Doe</h4>
  
	  <span class="chat-message-counter">3</span>
  
	</header>
  
	<div class="chat">
	  <div class="chat-history">
  
		<div class="chat-message onchats">
  
		  <img src="http://lorempixum.com/32/32/people" alt="" width="32" height="32">
  
		  <div class="chat-message-content clearfix">
  
			<span class="chat-time">13:35</span>
  
			<h5>John Doe</h5>
  
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, explicabo quasi ratione odio dolorum harum.</p>
  
		  </div> <!-- end chat-message-content -->
  
		</div> <!-- end chat-message -->
  
		<hr>
  
		<div class="chat-message clearfix">
  
		  <img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32">
  
		  <div class="chat-message-content clearfix">
  
			<span class="chat-time">13:37</span>
  
			<h5>Marco Biedermann</h5>
  
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectus!</p>
  
		  </div> <!-- end chat-message-content -->
  
		</div> <!-- end chat-message -->
  
		<hr>
  
		<div class="chat-message clearfix">
  
		  <img src="http://lorempixum.com/32/32/people" alt="" width="32" height="32">
  
		  <div class="chat-message-content clearfix">
  
			<span class="chat-time">13:38</span>
  
			<h5>John Doe</h5>
  
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
  
		  </div> <!-- end chat-message-content -->
  
		</div> <!-- end chat-message -->
  
		<hr>
  
	  </div> <!-- end chat-history -->
  
	  <p class="chat-feedback">Your partner is typing…</p>
  
	  <form action="#" method="post">
  
		<fieldset>
  
		  <input type="text" placeholder="Type your message…" autofocus>
		  <input type="hidden">
  
		</fieldset>
  
	  </form>
  
	</div> <!-- end chat -->
  
  </div> <!-- end live-chat -->
			  {{-- <script>
				(function ($) {
				
				})(jQuery);
			  </script> --}}
  