<div class="card-header">
    <h5>Design</h5>
</div>
<div class="card-block pb-0 pt-0">
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td style="width:30%">Selected Design </td>
                    <td style="width:70%">
                        @if ($wizeredObj->selectedDesignObj == null)
                        -
                        @else
                        @php
                        $design = $wizeredObj->selectedDesignObj;
                        @endphp
                        <img src="{{ asset($design->image) }}" class="img-fluid displayPictureLarge rounded-0" alt="">
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
