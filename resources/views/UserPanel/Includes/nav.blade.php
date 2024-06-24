<div class="row w-100 justify-content-between border border-3 border-primary border-top-0 border-bottom-0 border-end-0 ps-2 ms-0 mb-3">
    <div class="col-7">
        <h3 class="p-0 m-0 bread-crumb-heading name module_name" id="navMId"></h3>
    </div>
    <div class="col-5 d-flex justify-content-end">
      {{-- <button class="btn btn-primary my-2">🔔</button> --}}


<style>
.head{
  display:flex;
  justify-content: space-between;
}
</style>

      <div class="nav-item dropdown d-flex me-3">
        <a type="button" href="javascript:void(3);" class="btn btn-primary my-2 ps-3 pe-3 nav-link px-0 show_notification btn btn-primary position-relative">
          🔔
          <span class="position-absolute top-10 end-20  translate-middle p-1 bg-danger border border-light rounded-circle">
           
          </span>
        </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card notification_menu " style="top: 64px; right: 0px;padding:0px;">
            <div class="card">
              <div class="card-header" style="background-color:#02b2b0;color:white">
             <div class="header">
             <div class="head">
              <h3 class="card-title">Notification</h3>
              <button onclick="closeNotification()" class="btn btn-close"></button>
             </div>
             </div>
                <span class="all_read"  onclick="all_read();" style="font-size: 14px;margin-left: auto;" role="button">Mark all as read</span>
              </div>
              <div class="list-group list-group-flush list-group-hoverable ">
              <div class="append_notifications" style="max-height:420px;min-height:420px;max-width:420px;min-width:420px;overflow-y: auto;">
              </div>
                <button class="btn btn-light load_more"  from="" to="" onclick="get_notification($('.load_more').attr('from'),$('.load_more').attr('to'))">Load More</button>
              </div> 
            </div>
          </div>
        </div>
  </div>
    
</div>