<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add/Edit Product <i class="fa fa-user-circle-o" aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addform" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Product name:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="productname" name="productname" required="required">
                    </div>
                    <div id="errorProductName" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Product Description:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        </div>
                        <textarea class="form-control" id="productdescription" name="productdescription" required="required" cols="30" rows="10"></textarea>
                    </div>
                    <div id="errorDesc" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Date Created:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt" aria-hidden="true"></i></span>
                        </div>
                        <input type="date" class="form-control" id="productdate" name="productdate" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Photo:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-picture-o" aria-hidden="true"></i></span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="productimg" id="productimg" >
                            <label class="custom-file-label" for="userphoto">Choose file</label>
                        </div>
                    </div>
                    <div id="errorFile" class="error"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="addButton">Submit</button>
                <input type="hidden" name="actionn" value="addProductAjax">
            </div>
      </form>
    </div>
  </div>
</div>