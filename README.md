# IntProgProject
A simple python reddit bot that uploads to a live website.

Python 'bot' scrapes front page of reddit every 30 minutes tallying how many times a subreddit is on that list of posts. 
- I used one Heroku 'dyno' to run that script at intervals, which i thought worked pretty well after the inital setup.
- I then used Heroku postgres to take care of the simpler database push/pulls in order to organize the information.
- Used php hooks to pull a formatted version of the database and display on the website. 

> website in question is 'reesegallagher.com'

