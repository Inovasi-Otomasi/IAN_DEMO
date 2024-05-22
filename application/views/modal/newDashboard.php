<form action="<?= base_url('index.php/process/insert/dashboard') ?>" method="post">
  <h5 class="text-info"><i class="fa-solid fa-tv fa-lg"></i> Add New Dashboard</h5>
  <hr>
  <div class="mb-1">
    <label for="dashboardName" class="form-text">Dashboard Name</label>
    <input type="text" class="form-control" name="name" id="dashboardName" required placeholder="Monitoring">
  </div>
  <div class="mb-1">
    <label for="DashboardURL" class="form-text">Dashboard URL</label>
    <input type="text" required class="form-control" name="url" id="DashboardURL" placeholder="https://example.com/mydashboard">
  </div>
  <div class="mb-1">
    <label for="description" class="form-text">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
  </div>

  <label for="company" class="form-text">Company</label>
  <select class="form-select mb-2" id="company" required name="company_id" aria-label="Company">
    <?php foreach($company as $comp): ?>
      <option value="<?= $comp->id ?>"><?= $comp->name ?></option>
    <?php endforeach ?>
  </select>

  <button type="submit" class="btn mt-2 btn-info text-white rounded-pill btn-sm" style="width:100%">Submit</button>
</form>