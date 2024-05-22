<style>
    .btn-disabled {
        color: blue !important;
        font-weight: bold;
    }
</style>
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item d-flex ">
        <h2 class="accordion-header">
            <button class="btn users-menu border border-0 btn-disabled" type="button" data-bs-toggle="collapse" disabled data-bs-target="#users" aria-expanded="true" aria-controls="users">
                <i class="fa-solid fa-users"></i> Users Setting
            </button>
        </h2>
        <h2 class="accordion-header">
            <button class=" btn users-menu border border-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#company" aria-expanded="false" aria-controls="company">
                <i class="fa-solid fa-city"></i> Company Setting
            </button>
        </h2>
        <h2 class="accordion-header">
            <button class=" btn users-menu border border-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#preferences" aria-expanded="false" aria-controls="preferences">
                <i class="fa-solid fa-users-gear"></i> Preferences
            </button>
        </h2>
    </div>
    <div class="accordion-item">
        <div id="users" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample" style="">
            <div class="accordion-body">
                <!-- user setting start -->
                <div class="card shadow">
                    <div class="card-header border-0 d-flex justify-content-between">
                        <h5 class="mb-0 text-secondary"><i class="fa-solid fa-chalkboard-user"></i> Users</h5>
                        <div>
                            <input type="text" class="form-control rounded-pill" search-target=".user-list" placeholder="Search">
                        </div>
                    </div>
                    <div class="table-responsive px-3">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">#</th>
                                    <th scope="col" class="sort" data-sort="budget">Name</th>
                                    <th scope="col" class="sort" data-sort="status">Company</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" class="sort" data-sort="completion">
                                        Last Login
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">

                                <!-- list user start -->
                                <?php foreach($users as $usr): ?>
                                <tr class="item-list user-list">
                                    <td class="budget"><?= $usr->id ?></td>
                                    <th scope="row">
                                        <p class="p-0 m-0"><?= $usr->username ?></p>
                                        <?php   
                                            if($usr->active == 1){
                                                echo("<span style='font-size:12px' class='fw-normal text-success'> <i class='fa-solid fa-circle fa-2xs'></i> active</span>");
                                            } else {
                                                echo("<span style='font-size:12px' class='fw-normal text-danger'> <i class='fa-solid fa-circle fa-2xs'></i> not active</span>");
                                            }
                                        ?>
                                    </th>
                                    <td class="budget">
                                        <?php foreach($company as $comp){
                                            if($comp->id == $usr->company_id ){
                                                echo $comp->name;
                                            }
                                        } ?>                                            
                                    </td>
                                    <td>
                                        <?php foreach($role as $rl){
                                            if($rl->id == $usr->role_id ){
                                                echo $rl->name;
                                            }
                                        } ?>                                            
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2"><?= $usr->login ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end align-items-center" style="gap: 10px; width:100%">
                                            <a href="javascript:void(0)" modtrig="editUser~~<?= $usr->id ?>"><i class="fa-solid fa-user-gear"></i></a>
                                            <a class="link-danger" href="javascript:void(0)" moddel="'<?= $usr->username ?>'//users//<?= $usr->id ?>"><i class="fa-solid fa-user-xmark"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                <!-- list user end -->

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-3">
                        <nav class="d-flex justify-content-end">
                            <button class="btn actived border-0 btn-sm rounded-pill px-4" modtrig="newUser"><i class="fa-solid fa-user-plus"></i>Add User</button>
                        </nav>
                    </div>
                </div>
                <!-- user setting end -->
            </div>
        </div>
        <div id="company" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample" style="">
            <div class="accordion-body">
                <!-- company setting start -->
                <div class="card shadow">
                    <div class="card-header border-0 d-flex justify-content-between">
                        <h5 class="mb-0 text-secondary"><i class="fa-solid fa-warehouse"></i> Company</h5>
                        <div>
                            <input type="text" class="form-control rounded-pill" search-target=".company-list" placeholder="Search">
                        </div>
                    </div>
                    <div class="table-responsive px-3">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">#</th>
                                    <th scope="col" class="sort" data-sort="budget">Company Name</th>
                                    <th scope="col" class="sort" data-sort="budget">Description</th>
                                    <th scope="col" class="sort" data-sort="completion">
                                        Since
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                
                                <!-- list user start -->
                                <?php foreach($company as $comp): ?>
                                <tr class="item-list company-list">
                                    <td class="budget"><?= $comp->id ?></td>
                                    <th scope="row">
                                        <p class="p-0 m-0"><?= $comp->name ?></p>
                                    </th>
                                    <td class="budget"><?= $comp->description ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2"><?= $comp->since ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end align-items-center" style="gap: 10px; width:100%">
                                            <a href="javascript:void(0)" modtrig="editCompany~~<?= $comp->id ?>"><i class="fa-solid fa-screwdriver-wrench"></i></a>
                                            <a class="link-danger" href="javascript:void(0)" moddel="'<?= $comp->name ?>'//company//<?= $comp->id ?>"><i class="fa-regular fa-trash-can"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                <!-- list user end -->

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-3">
                        <nav class="d-flex justify-content-end">
                            <button class="btn actived border-0 btn-sm rounded-pill px-4" modtrig="newCompany"><i class="fa-solid fa-folder-plus"></i> Add Company</button>
                        </nav>
                    </div>
                </div>
                <!-- company setting end -->
            </div>
        </div>
        <div id="preferences" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample" style="">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
        </div>
    </div>
</div>

<script>
    function getId(){
        let url = $(location).attr('href').split('#')
        let id = url[1]
        $(".users-menu").each(function(){
            let target = $(this).attr("data-bs-target")
            if(target == "#"+id){
                $(this)[0].click();
                menuClick(this)
            } 
        })
    }

    getId()

    $(".users-menu").click(function(){
        menuClick(this)
    });

    function menuClick(ini){
        $(".users-menu").prop("disabled", false);
        $(".users-menu").removeClass("btn-disabled");
        let page = $(ini).attr("data-bs-target")
        let url = $(location).attr('href').split('#')[0]+page
        window.history.pushState(page, page, url);

        $(ini).prop("disabled", true);
        $(ini).addClass("btn-disabled");
    }
</script>