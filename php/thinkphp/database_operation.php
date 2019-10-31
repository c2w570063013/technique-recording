<?php

//print sql syntax
dump(M('User_adress')->_sql());exit();

//order by in thinkphp3.1
->order("`default` DESC");// watch the '`' symbol. if this symbol does not exist, an error will occur.

#Raw query
$sql = 'select a.supply_id,a.yuyue_time,a.end_time,a.status,b.name 
from pigcms_appoint_supply a left join pigcms_merchant_workers b on (a.worker_id = b.merchant_worker_id) 
where a.order_id = ' . $order_id . ' order by order_time desc ';
$now_supplys = D('Appoint_supply')->query($sql);