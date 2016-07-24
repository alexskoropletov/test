alex@VB:~/code/test$ git status
On branch master
Your branch is up-to-date with 'origin/master'.

Untracked files:
  (use "git add <file>..." to include in what will be committed)

	.gitignore
	git/

nothing added to commit but untracked files present (use "git add" to track)
alex@VB:~/code/test$ git checkout -b gitTest
Switched to a new branch 'gitTest'
alex@VB:~/code/test$ git add .
alex@VB:~/code/test$ git status
On branch gitTest
Changes to be committed:
  (use "git reset HEAD <file>..." to unstage)

	new file:   .gitignore
	new file:   git/README.md

alex@VB:~/code/test$ git commit -a -m 'git test task'
alex@VB:~/code/test$ git commit -a -m 'git test task'
[gitTest 7af84d8] git test task
 2 files changed, 24 insertions(+)
 create mode 100644 .gitignore
 create mode 100644 git/README.md
alex@VB:~/code/test$ git push -u origin gitTest
Counting objects: 6, done.
Delta compression using up to 2 threads.
Compressing objects: 100% (3/3), done.
Writing objects: 100% (5/5), 674 bytes | 0 bytes/s, done.
Total 5 (delta 0), reused 0 (delta 0)
To git@github.com:alexskoropletov/test.git
 * [new branch]      gitTest -> gitTest
Branch gitTest set up to track remote branch gitTest from origin.
alex@VB:~/code/test$ git checkout master
Switched to branch 'master'
Your branch is up-to-date with 'origin/master'.
alex@VB:~/code/test$ git merge gitTest
Updating 8b9a18e..7af84d8
Fast-forward
 .gitignore    |  1 +
 git/README.md | 23 +++++++++++++++++++++++
 2 files changed, 24 insertions(+)
 create mode 100644 .gitignore
 create mode 100644 git/README.md
alex@VB:~/code/test$ 
