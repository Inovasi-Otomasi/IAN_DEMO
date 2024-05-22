<form action="<?= base_url('index.php/process/insert/company') ?>" method="post">
  <h5 class="text-info"><i class="fa-solid fa-folder-plus fa-lg"></i> Add New Company</h5>
  <hr>
  <div class="mb-1">
    <label for="companyname"  class="form-text">Company Name</label>
    <input type="text" required name="name" class="form-control" id="companyname" placeholder="Example Company LTD">
  </div>
  <div class="mb-1">
    <label for="description" class="form-text">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
  </div>


  <button type="submit" class="btn mt-2 btn-info text-white rounded-pill btn-sm" style="width:100%">Submit</button>
</form>