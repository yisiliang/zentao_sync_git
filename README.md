# zentao_sync_git
zentao与git同步

zentao自带的同步工具需要是两个Job，一个不停的pull下来，另一个记录上一次commit，然后分析最后commit和上次commit之间的内容。
有了分支之后，好像就搞不定了（至少我不知道该怎么办了）。

搜索了一下，决定用post-receive来保存commit信息，然后修改zentao的导入模块来实现zentao与git的关联。

## 步骤：
1. 在版本库中创建并修改hooks/post-receive，这个脚本中调用git_to_zentao.php；
2. git_to_zentao.php中将repoRoot、fromRevision和endRevision保存到文件中，并scp到zentao服务器；
3. 修改zentao中[***module/git/model.php***](https://github.com/yisiliang/zentaopms/blob/master/module/git/model.php)的run函数，修改成从文件中获取repoRoot、fromRevision和endRevision；
4. 修改zentao中[***module/git/model.php***](https://github.com/yisiliang/zentaopms/blob/master/module/git/model.php)的git命令实现，使用ssh到git服务器中执行git命令。

