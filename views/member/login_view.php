<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class='container'>
    <div style='margin-top:30px;'>
        <form novalidate="novalidate" name="frm" id0="frm" id="frmLiveAccount" method="POST"  class="form-horizontal" role="form"> 
			<div class="frame-form-basic">
			<h2>Login</h2>
           
      
          <div class="panel-body">
            <div class="form-group">

              <label for="myEmail1">
                Username
              </label>
              <input class="form-control" id="myUser" type="text" name="username" />
            </div>
            <div class="form-group">

              <label for="myPassword1">
                Password
              </label>
              <input class="form-control" id="myPassword" type="password" name="password" />
            </div>
             
            <button type="button" class="btn btn-default submitLogin" onclick="login()">
              Submit
            </button>
          </div>
          <div class='clear'></div> 
        </div>
      </form>
    </div>
     
</div>
<script>

</script>