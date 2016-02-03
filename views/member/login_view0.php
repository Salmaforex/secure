<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      <form class="form-inline" role="form" id="frmLiveAccount">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">
						Login
			</h3>
          </div>
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
    <div class="col-md-2">
    </div>
  </div>
</div>
<script>

</script>