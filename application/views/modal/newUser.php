<form action="<?= base_url('index.php/process/insert/users') ?>" method="post">
  <h5 class="text-info"><i class="fa-solid fa-user-plus fa-lg"></i> Add New User</h5>
  <hr>
  <div class="mb-1">
    <label for="name" class="form-text">Username</label>
    <input type="text" class="form-control" id="name" name="username" required placeholder="new user">
  </div>
  <div class="mb-1">
    <label for="password" class="form-text">Password</label>
    <input type="password" class="form-control" required name="password" id="password">
  </div>
  <label for="role" class="form-text">Role</label>
  <select class="form-select" id="role" required name="role_id" aria-label="role">
    <?php foreach($role as $rl): ?>
      <option value="<?= $rl->id ?>"><?= $rl->name ?></option>
    <?php endforeach ?>
  </select>

  <label for="company" class="form-text">Company</label>
  <select class="form-select mb-2" id="company" required name="company_id" aria-label="Company">
    <?php foreach($company as $comp): ?>
      <option value="<?= $comp->id ?>"><?= $comp->name ?></option>
    <?php endforeach ?>
  </select>
  
  <input type="hidden" name="active" value="0">
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" name="active" role="switch" value="1" id="flexSwitchCheckChecked">
    <label class="form-check-label form-text" for="flexSwitchCheckChecked">Activate User</label>
  </div>


  <button type="submit" class="btn mt-2 btn-info text-white rounded-pill btn-sm" style="width:100%">Submit</button>
</form>