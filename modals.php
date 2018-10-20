    <div class="modal fade mymodal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             <button class="btn btn-primary" type="button" id="logoutit" data-dismiss="modal">Logout</button>
           
          </div>
        </div>
      </div>
    </div>

<div class="modal fade mymodal" id="viewInfo" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Full information :</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">hey view</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal"   id="fu">UPDATE</button>
           <button class="btn btn-primary" data-dismiss="modal" id="fd">DELETE</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade mymodal" id="error" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Error/Information</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="error-body">hey view</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal"   id="email">Report</button>
           <button class="btn btn-primary" data-dismiss="modal" id="ok">Ok</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade mymodal" id="updateModal" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Info !</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="updateBody" >hey view</div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade mymodal" id="attendSelect" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select List</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="attend_select_body"><?php include_once 'attendence_select.php'; ?></div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

