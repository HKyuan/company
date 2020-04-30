@component('mail::message')

# 感謝您註冊本系統
# 以下是您申請的資訊

<strong>信箱:</strong>{{ $param['email'] }} <br>
<strong>姓名:</strong>{{ $param['name'] }} <br>
<strong>電話:</strong>{{ $param['phone'] }} <br>
<strong>公司編號:</strong>{{ $param['company_id'] }}

# Thanks {{ $param->roles()->first()['title'] }}
@endcomponent
