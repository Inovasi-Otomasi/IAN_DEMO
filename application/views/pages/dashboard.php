<div class="position-relative">
    <div class="position-fixed bottom-0 end-0" style="width: 18rem;">
        <div class="accordion" id="accordionExample">
            <div class="bg-glass d-flex flex-column">
                <button class="btn-sm btn-light btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Menu
                </button>
                <div id="collapseOne" class="accordion-collapse show collapse" data-bs-parent="#accordionExample">
                    <div class="border" style="height:100vh">
                        <div class="d-flex justify-content-end border-bottom pb-0">
                            
                            <button class="btn-sm btn-light btn bg-glass" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa-solid fa-chevron-down fa-lg"></i>
                            </button>
                        </div>
                        <ul class="list-group">
                            <?php if($this->auths->admin()): ?>
                                <li class="bg-glass list-group-item d-flex position-relative p-0" style="height:58px">
                                    <a modtrig="newDashboard" class="btn position-absolute text-start text-center text-secondary" style="width:100%">
                                        <i class="fa-solid fa-plus fa-2xl"></i>
                                        <p class="p-0 m-0" style="font-size:12px">new dashboard</p>
                                    </a>
                                </li>
                            <?php endif ?>
                            <li class="bg-glass list-group-item d-flex position-relative p-0 mb-0" style="height:38px">
                                <input type="search" style="width:100%" class="rounded-pill form-control form-control-sm" search-target=".list-dashboard" autocomplete="false" placeholder="Search">
                            </li>

                            <!-- dashboard list start -->
                            <?php foreach($dashboard as $dash): ?>
                            <li class="bg-glass list-group-item d-flex position-relative p-0 item-list list-dashboard" style="height:58px">
                                <a class="btn position-absolute text-start border boreder-0" target="iframe_content" href="<?= $dash->url ?>" iframe-target="<?= $dash->url ?>" style="width:100%">
                                    <div >
                                        <span class="fw-bold p-0 m-0"><?= $dash->name ?></span>
                                        <span class="link-warning star-fav">
                                            <i class="fa-solid fa-star fa-xs"></i>
                                        </span>
                                    </div>
                                    <p style="font-size: small" class="text-faded p-0 m-0"><?php foreach($company as $comp){if($comp->id == $dash->company_id)echo $comp->name;} ?></p>
                                </a>
                                <div class="position-absolute d-flex justify-content-end vertical-center end-0" style="gap:5px">
                                <?php if($this->auths->admin()): ?>
                                    <a class="link-secondary" modtrig="editDashboard~~<?= $dash->id ?>" href="#"><i class="fa-solid fa-wrench fa-xs"></i></a>
                                    <a class="link-danger" style="margin-right:10px" moddel="'<?= $dash->name ?>'//dashboard//<?= $dash->id ?>" href="#"><i class="fa-solid fa-trash-can fa-xs"></i></a>
                                <?php endif ?>
                                </div>
                            </li>
                            <?php endforeach ?>
                            <!-- dashboard list end -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<iframe src="<?= $dashboard[0]->url ?>" name="iframe_content" frameborder="0" width="100%" height="100%"></iframe>

<script>
    $(".star-fav").click(function(){
        if($(this).hasClass("link-secondary")){
            //add to favorite
            $(this).removeClass("link-secondary")
            $(this).addClass("link-warning")
        } else {
            //remove from favorite
            $(this).removeClass("link-warning")
            $(this).addClass("link-secondary")
        }
    });

    $(document).on('click', "[iframe-target]", function(e){
        let target = $(e.target).closest('.star-fav');
        if(target.length == 1){
            e.preventDefault()
            //star stuff here
        }
    })
</script>