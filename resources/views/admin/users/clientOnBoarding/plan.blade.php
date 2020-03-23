<div class="card-header">
    <h5>Plan</h5>
</div>
<div class="card-block pb-0 pt-0">
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td style="width:30%">Selected Plan </td>
                    <td style="width:70%">
                        @php

                        switch ($wizeredObj->planId) {
                        case 'basicPlanYearly':
                        $plan = "Basic Plan - Yearly";
                        break;
                        case 'essentialPlanYearly':
                        $plan = "Essential Plan - Yearly";
                        break;
                        case 'activePlanYearly':
                        $plan = "Active Plan - Yearly";
                        break;
                        case 'completePlanYearly':
                        $plan = "Complete Plan - Yearly";
                        break;
                        case 'basicPlanMonthly':
                        $plan = "Basic Plan - Monthly";
                        break;
                        case 'essentialPlanMonthly':
                        $plan = "Basic Plan - Monthly";
                        break;
                        case 'activePlanMonthly':
                        $plan = "Active Plan - Monthly";
                        break;
                        case 'completePlanMonthly':
                        $plan = "Complete Plan - Monthly";
                        break;
                        default:
                        $plan = '-';
                        break;
                        }
                        @endphp
                        {{ $plan }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
