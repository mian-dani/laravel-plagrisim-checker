@if ($message = Session::get('success'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade show p-2 bg-white" role="alert" aria-live="assertive" id="successToast"
            aria-atomic="true">
            <div class="toast-header border-0">
                <i class="material-icons text-success me-2">
                    check
                </i>
                <span class="me-auto font-weight-bold">Success </span>
                {{-- <small class="text-body">11 mins ago</small> --}}
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
@endif

<!-- @if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif -->

@if ($message = Session::get('warning'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade show p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="warningToast"
            aria-atomic="true">
            <div class="toast-header border-0">
                <i class="material-icons text-warning me-2">
                    travel_explore
                </i>
                <span class="me-auto font-weight-bold">Warning</span>
                {{-- <small class="text-body">11 mins ago</small> --}}
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
             <div class="toast fade show p-2 mt-2 bg-gradient-info" role="alert" aria-live="assertive" id="infoToast"
          aria-atomic="true">
          <div class="toast-header bg-transparent border-0">
            <i class="material-icons text-white me-2">
              notifications
            </i>
            <span class="me-auto text-white font-weight-bold">Information</span>
            {{-- <small class="text-white">11 mins ago</small> --}}
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast"
              aria-label="Close"></i>
          </div>
          <hr class="horizontal light m-0">
          <div class="toast-body text-white">
            {{ $message }}
          </div>
        </div>
    </div>
@endif

<!-- @if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Please check the form below for errors
</div>
@endif -->
@if ($message = Session::get('delete'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade show p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast"
            aria-atomic="true">
            <div class="toast-header border-0">
                <i class="material-icons text-danger me-2">
                    campaign
                </i>
                <span class="me-auto text-gradient text-danger font-weight-bold">Delete</span>
                {{-- <small class="text-body">11 mins ago</small> --}}
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
@endif
