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
