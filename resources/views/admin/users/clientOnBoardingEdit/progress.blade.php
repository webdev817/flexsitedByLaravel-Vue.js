<div class="card">
    <div class="card-block pt-0">
        <h6 class="text-muted mt-4 mb-3">Progress :

            @if ($wizeredObj->currentStep == 1)
            Website Domain
            @elseif ($wizeredObj->currentStep == 2)
            Website Design Inspiration
            @elseif ($wizeredObj->currentStep == 3)
            Website Package
            @elseif ($wizeredObj->currentStep == 4)
            Subscription Plan and Billing
            @elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == null)
            Business Information
            @elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == "allDone")
            Completed
            @else
            Registered
            @endif

           
        </h6>
        @if (is_numeric($wizeredObj->currentStep))

          @php
            if ($wizeredObj->currentStep == 1) {
              $width = 20;
            }elseif ($wizeredObj->currentStep == 2) {
              $width = 20;
            }elseif ($wizeredObj->currentStep == 3) {
              $width = 40;
            }elseif ($wizeredObj->currentStep == 4) {
              $width = 60;
            }elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == null) {
              $width = 80;
            }elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == "allDone") {
              $width = 100;
            }else {
              $width = 0;
            }
          @endphp
          <div class="progress">
            <div class="progress-bar progress-c-theme" role="progressbar" style="width:{{ $width }}%;height:11px;" aria-valuenow="{{ $width }}" aria-valuemin="0"
              aria-valuemax="100"></div>
            </div>
        @endif
    </div>
</div>
