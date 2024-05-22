<form action="<?= base_url('index.php/process/edit/company/') . $data->id ?>" method="post">
  <h5 class="text-info"><i class="fa-solid fa-folder-plus fa-lg"></i> Edit Company</h5>
  <hr>
  <div class="mb-1">
    <label for="companyname" required class="form-text">Company Name</label>
    <input type="text" class="form-control" id="companyname" name="name" value="<?= $data->name ?>" placeholder="Example Company LTD">
  </div>
  <div class="mb-1">
    <label for="description" class="form-text">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"><?= $data->description ?></textarea>
  </div>


  <button type="submit" class="btn mt-2 btn-info text-white rounded-pill btn-sm" style="width:100%">Submit</button>
</form>