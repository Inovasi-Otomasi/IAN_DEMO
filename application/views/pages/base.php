<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
    <link href="<?= base_url('assets/') ?>fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>fontawesome/css/brands.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>fontawesome/css/solid.css" rel="stylesheet" />
    <style>
        .actived {
            color: white !important;
            background: linear-gradient(341deg, rgba(0,206,255,1) 0%, rgba(255,0,198,1) 100%) !important;
        }
        
        .menu-items{
            -webkit-transition: background-image 2s ease-out;
            -moz-transition: background-image 2s ease-out;
            -o-transition: background-image 2s ease-out;
            transition: background-image 2s ease-out;
        }

    </style>
    <title>IAN Platform</title>
  </head>
  <body>
    <main class="position-sticky top-0 bottom-0 d-flex">
      <nav
        class="d-flex flex-column flex-shrink-0 bg-light"
        style="width: 4.5rem; height: 100vh"
      >
        <a
          href="/"
          class="d-block p-3 link-dark text-decoration-none"
          title="IAN Platform"
          data-bs-toggle="tooltip"
          data-bs-placement="right"
        >
          <img src="<?= base_url('assets/img/ian.png') ?>" alt="ian platform" height="28px">
          <span class="visually-hidden">Icon-only</span>
        </a>
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
          <li class="nav-item">
            <a
              href="javascript:void(0)"
              class="nav-link actived py-3 border-bottom menu-items"
              title="Home"
              page="home"
              data-bs-toggle="tooltip"
              data-bs-placement="right"
            >
              <i class="fa-regular fa-house"></i>
            </a>
          </li>
          <li>
            <a
              href="javascript:void(0)"
              class="nav-link py-3 border-bottom menu-items"
              title="Dashboard"
              page="dashboard"
              data-bs-toggle="tooltip"
              data-bs-placement="right"
            >
              <i class="fa-regular fa-tv"></i>
            </a>
          </li>
          <li>
            <a
              href="javascript:void(0)"
              class="nav-link py-3 border-bottom menu-items"
              title="User & Client"
              page="client"
              data-bs-toggle="tooltip"
              data-bs-placement="right"
            >
            <i class="fa-solid fa-id-card-clip fa-lg"></i>
            </a>
          </li>
        </ul>
        <div class="dropdown border-top">
          <a
            href="javascript:void(0)"
            class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle"
            id="dropdownUser3"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
              alt="mdo"
              width="24"
              height="24"
              class="rounded-circle"
            />
          </a>
          <ul
            class="dropdown-menu text-small shadow"
            aria-labelledby="dropdownUser3"
          >
            <li><a class="dropdown-item" href="jsvascript:void(0)" modtrig="editUser~~<?= $_SESSION["id"] ?>">Profile Setting</a></li>
            <li><hr class="dropdown-divider"/></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/auth/logout') ?>">Sign out</a></li>
          </ul>
        </div>
      </nav>

      <div
        style="
          height: 100vh;
          overflow-y: scroll;
          width: inherit;
          flex-basis: 100%;
        "
        id="main-page" data-page="<?= $page ?>" 
      >
        
      </div>
    </main>

    <!-- modal -->
    <div class="modal fade bg-glass" id="modallg" tabindex="-1" aria-labelledby="modallgLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-glass">
          <div class="modal-body" id="modallg-content">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade bg-glass" id="modaldelete" tabindex="-1" aria-labelledby="modaldeleteLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content bg-glass">
          <div class="modal-body" id="modaldelete-content">
            <h5>
              Confirm delete <span id="deleted-item"></span>?
            </h5>
          </div>
          <div class="modal-footer">
            <a type="button" href="" id="delete-btn" class="btn btn-danger">Delete</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div id="dummy" class="d-none"></div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script> -->
    <script>
      let deletedItem;
      const popoverTriggerList = document.querySelectorAll(
        '[data-bs-toggle="popover"]'
      );
      const popoverList = [...popoverTriggerList].map(
        (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
      );

      const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
      );
      const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
      );

      let container = $("#main-page")
      let baseUrl = "<?= base_url() ?>"
      let currentPage = container.attr("data-page")
      loader(currentPage)
      $(".menu-items").removeClass("actived");
      $(".menu-items[page='"+ currentPage +"']").addClass("actived");

      $(".menu-items").click(function () {
        let page = $(this).attr("page");
        if(container.attr("data-page") != page){
          $(".menu-items").removeClass("actived");
          $(this).addClass("actived");
          window.history.pushState(page, page, baseUrl+"index.php/dashboard/pages/"+page);
          $(this).tooltip('hide')
          container.attr("data-page", page)
          loader(page);
        }
      });



      function loader(page){
        let url = baseUrl + "index.php/dashboard/loader/" + page
        container.load(url)
      }

      $(document).on("click", "[modtrig]", function(){
        let data = $(this).attr("modtrig")
        let url = baseUrl + "index.php/dashboard/modal/" + data
        
        $("#modallg-content").load(url)
        $("#modallg").modal('show')
      })

      $(document).on("click", "[moddel]", function(){
        let data = $(this).attr("moddel").split('//')
        let url = baseUrl + "index.php/process/delete/" + data[1] + "/" + data[2]
        deletedItem = $(this).closest(".item-list")
        $("#deleted-item").html(data[0]);
        $("#delete-btn").attr("href",url);
        $("#modaldelete").modal('show')
      })
      
      $("#delete-btn").click(function(e){
        e.preventDefault();
        deletedItem.remove()
        let url = $(this).attr('href')
        $("#dummy").load(url)
        $("#modaldelete").modal('hide')
      });

      $(document).on("keyup", "[search-target]", function(){
        let target = $(this).attr("search-target");
        let value = $(this).val().toLowerCase()
        $(target).each(function(){
          if($(this).html().toLowerCase().includes(value)){
            $(this).removeClass('d-none')
          } else {
            $(this).addClass('d-none')
          }
        })
      })

      $(document).on('submit', 'form' , function(e){
        e.preventDefault();
        let data = $(this).serialize()
        console.log(data)
        $.ajax({
            type : $(this).attr('method'),
            url : $(this).attr('action'),
            data : data,
            success : function(res){
              if(res == "done"){
                location.reload();
              } else {
                alert(res)
              }
            }
        })
      })
    </script>
  </body>
</html>
