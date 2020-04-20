@if ($status == 1)
<div class="statusInitlizing">
    Initializing
</div>
@elseif ($status == 2)
<div class="statusInProgress">
    In Progress
</div>
@elseif ($status == 3)
<div class="statusInReview">
    In Review
</div>
@elseif ($status == 10)
<div class="statusCompleted">
    Completed
</div>
@elseif ($status == 20)
<div class="statusCancelled">
    Cancelled
</div>
@else
Unknown
@endif
