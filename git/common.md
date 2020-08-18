### set up git server
https://www.liaoxuefeng.com/wiki/896043488029600/899998870925664

### gen ssh key on linux
```shell script
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"
```

Transferred from note (1)
```shell script
新建分支
git branch -l (查看本地有哪些分支)
git checkout master （切换到master 因为本地有master 所依不需要用origin）
git pull (将master 分支最新代码拉下来)
git checkout -b searchFix (在master里边新建searchFix分支)
git push --set-upstream origin searchFix（提交新建的分支）
git branch -r（查看远程的分支）
git remote update origin --prune (更新远程分支列表)

切换分支前 暂存储藏区
git stash
git status
git checkout master
git checkout searchFix
git stash list
git stash pop #apply last stash and remove it from list
git show stash@{0} # see the last stash


git stash pop stash@{0}

Git stash can not store new created file. This function can only be used to store the changes of existing files.


git checkout -b asdw origin/asdw (生成本地分支 关联远程分支 并且切换到asdw这个分支)
git checkout -b wayne_fix 在当前分支 新建 waayne_fix分支 并且切换到这个分支
git merge wayne_fix 当前分支下合并wayne_fix分支


git 切换到分支
git checkout question -b origin/question (在本地新建分支 并且关联到远程的分支)
git branch -d question (删除分支)
git branch -vv (查看分支关联)

git cancel a local commit
git reset head~1

## git revert code to previous version
The safer way is create a new branch and revert previous code to that branch and keep the main branch untouched.
git checkout -b old-project-state_1 93e0ec91b2eda58cdfd6020df420d84a18ab4100

The much dangerous way is:

```

Transferred from note (2)
```shell script
Git creat new branch

Git checkout origin/master
Git checkout -b new_mobile
Git push
Git push —set-upstream origin new_mobile

Switch to master
Git checkout master 
Git pull
Git checkout new_mobile
Git merge master
Git push
# git set remote url
git remote set-url origin https://hostname/USERNAME/REPOSITORY.git
```