<div class="app-content content container">
    <div class="card">
        <div class="card-header">
            <h1>Login</h1>
        </div>
        <div class="card-body">
           <form action="passer" id="foo" onsubmit="return false">
           <?php 
        //    unset($users_form['ID']);
           echo $c->create_form($users_form); ?>
           <input type="hidden" name="create_account" value="">
           <div id="custommessage"></div>
           <input type="submit" value="Submit" class="btn btn-primary">
        </form>
        </div>
    </div>
</div>
