<?php

//print sql syntax
dump(M('User_adress')->_sql());exit();

//order by in thinkphp3.1
->order("`default` DESC");// watch the '`' symbol. if this symbol does not exist, an error will occur.