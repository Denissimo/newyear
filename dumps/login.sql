SELECT a.granted, a.acclabs, a.user_id, u.row_id, u.login FROM sys_acc_cli AS a LEFT JOIN sys_users AS u ON a.user_id=u.row_id WHERE u.login = "login4" ORDER BY a.acl_datetime DESC LIMIT 1;