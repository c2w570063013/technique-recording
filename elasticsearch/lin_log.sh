echo -e "\033[32m
check `grep 'check precommit invalid' /meta/log/sealer.log |wc -l`
failed `grep SealCommitFailed /meta/log/sealer.log |wc -l`
oops `cat /meta/zk/recover | wc -l`
ok `grep Proving  /meta/log/sealer.log |grep replace | wc -l`\033[0m"




echo -e "\033[32mcheck `grep 'check precommit invalid' /meta/log/sealer.log |wc -l` failed `grep 'SealCommitFailed' /meta/log/sealer.log |wc -l` oops `cat /meta/zk/recover | wc -l` ok `grep 'Proving'  /meta/log/sealer.log |grep 'replace' | wc -l`\033[0m"

echo -e "\033[32mcheck `grep 'check precommit invalid' /meta/log/sealer3.log |wc -l` failed `grep 'SealCommitFailed' /meta/log/sealer3.log |wc -l` oops `cat /meta/zk/recover | wc -l` ok `grep 'Proving'  /meta/log/sealer3.log |grep 'replace' | wc -l`\033[0m"



# logs
Sun Nov 8 14:27:10 CST 2020
Sun Nov 8 14:45:10 CST 2020
Sun Nov 8 14:50:10 CST 2020
Sun Nov 8 15:23:10 CST 2020
Sun Nov 9 15:23:10 CST 2020
Sun Nov 10 15:23:10 CST 2020
Sun Nov 11 15:23:10 CST 2020

## failed
2020-11-12T00:41:04.503+0800
echo -e "\033[32mcheck `grep 'check precommit invalid' /meta/log/sealer.log |wc -l` failed `grep SealCommitFailed /meta/log/sealer.log |wc -l` oops `cat /meta/zk/recover | wc -l` ok `grep Proving  /meta/log/sealer.log |grep replace | wc -l`\033[0m"