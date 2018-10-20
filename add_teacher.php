
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Add Teachers
        
      </div>
      <div class="card-body">
        <form id="form" name="contact" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="name" placeholder="Enter Name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Contact No.</label>
            <input class="form-control" id="exampleInputEmail1" type="contact_no" name="contact_no"
             aria-describedby="emailHelp" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" 
            name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          
            <div class="form-group">
            <label for="exampleInputEmail1">Post as:</label>
            <SELECT class="form-control"  type="drop_down" name="type" >
              <option value="4">Class Teacher</option>
              <option value="3">Highery Secodary Head</option>
              <option value="2">Secondary Head</option>
              <option value="1">Primary Head</option>
              <option value="0">Pre-Primary Head</option>
            </SELECT> 
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
              </div>
            </div>
          </div>
          
          <input type="hidden" name="q" value="t">
          <input type="submit" name="sub" id="submit" class="btn btn-primary btn-block" href="login.html"
          value="Add">
        </form>
       
      </div>
    </div>
  </div>