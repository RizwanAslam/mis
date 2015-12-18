Dear {{ $leave->teammate->full_name }},
<br>
Your leave application for the date of {{ $leave->start_date }} has been approved.
<br>
Leaves quota: {{ $leave->teammate->no_of_leaves }} | Earned: {{ $leave->teammate->earned }} | Availed : {{ $leave->teammate->availed }} | Balance: {{  round($leave->teammate->earned-$leave->teammate->availed,2) }}
<br>
Thanks,
<br>
HR
<br>
Soft Pyramid