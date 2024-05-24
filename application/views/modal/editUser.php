<form action="<?= base_url('index.php/process/edit/users/') . $data->id ?>" method="post">
  <h5 class="text-info"><i class="fa-solid fa-user-gear fa-lg"></i> Edit User</h5>
  <hr>
  <div class="mb-1">
    <label for="name" class="form-text">Username</label>
    <input type="text" class="form-control" id="name" name="username" value="<?= $data->username ?>" required placeholder="new user">
  </div>
  <div class="mb-1">
    <label for="password" class="form-text">New Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <?php if(($this->auths->admin()) && ($data->id != $_SESSION['id'])): ?>
  <label for="role" class="form-text">Role</label>
  <select class="form-select" id="role" required name="role_id" aria-label="role">
    <?php foreach($role as $rl): ?>
      <option <?php if($rl->id == $data->role_id){echo "selected";} ?> value="<?= $rl->id ?>"><?= $rl->name ?></option>
    <?php endforeach ?>
  </select>

  <label for="company" class="form-text">Company</label>
  <select class="form-select mb-2" id="company" required name="company_id" aria-label="Company">
    <?php foreach($company as $comp): ?>
      <option <?php if($comp->id == $data->company_id)echo "selected";?> value="<?= $comp->id ?>"><?= $comp->name ?></option>
    <?php endforeach ?>
  </select>

  <input type="hidden" name="active" value="0">
  <div class="form-check form-switch">
    <input class="form-check-input" <?php if($data->active == 1)echo "checked"; ?> name="active" value="1" type="checkbox" role="switch" id="flexSwitchCheckChecked">
    <label class="form-check-label form-text" for="flexSwitchCheckChecked">Activate User</label>
  </div>
  <?php endif ?>
  <button type="submit" class="btn mt-2 btn-info text-white rounded-pill btn-sm" style="width:100%">Submit</button>
</form>