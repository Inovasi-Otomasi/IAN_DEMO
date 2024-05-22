<form action="<?= base_url('index.php/process/edit/dashboard/') . $data->id  ?>" method="post">
  <div class="d-flex justify-content-between">
      <h5 class="text-info"><i class="fa-solid fa-tv fa-lg"></i> Edit Dashboard</h5>
  </div>
  <hr>
  <div class="mb-1">
    <label for="dashboardName" class="form-text">Dashboard Name</label>
    <input type="text" required class="form-control" value="<?= $data->name ?>" name="name" id="dashboardName" placeholder="Monitoring">
  </div>
  <div class="mb-1">
    <label for="DashboardURL" class="form-text">Dashboard URL</label>
    <input type="text" required class="form-control" value="<?= $data->url ?>" id="DashboardURL" name="url" placeholder="https://example.com/mydashboard">
  </div>
  <div class="mb-1">
    <label for="description" class="form-text">Description</label>
    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
  </div>

  <label for="company" class="form-text">Company</label>
  <select class="form-select mb-2" id="company" required name="company_id" aria-label="Company">
    <?php foreach($company as $comp): ?>
      <option <?php if($comp->id == $data->company_id)echo "selected";?> value="<?= $comp->id ?>"><?= $comp->name ?></option>
    <?php endforeach ?>
  </select>

  <button type="submit" class="btn mt-2 btn-info text-white rounded-pill btn-sm" style="width:100%">Submit</button>
</form>