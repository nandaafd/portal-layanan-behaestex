 <!-- Modal -->
  <div class="modal fade" id="view-item-inventaris" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Item inventaris yang dipinjam oleh : <input style="border:none; background-color:transparent; font-size:1.25rem; font-weight:700;" 
            type="text" id="namaa"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
                <form action="">
                </form> 
            </div>
          </div>
          <div class="row" id="view-area"></div>
          <div class="row" hidden id="view-item">
            <div class="col-12">
              <form class="form form-horizontal"></form>
              <input readonly type="text" class="form-control" id="iteminv">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>