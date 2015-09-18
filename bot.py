"""
Ronald Gallagher
Simple Front Page Analysis 

Spring 2015
"""
import os
import psycopg2
import urlparse

urlparse.uses_netloc.append("postgres")
url = urlparse.urlparse(os.environ["DATABASE_URL"])

# connecting to server 

conn = psycopg2.connect(
    database=url.path[1:],
    user=url.username,
    password=url.password,
    host=url.hostname,
    port=url.port    
)
print "Opened database successfully"

#######################################################

import time
import praw

# connecting to reddit
r = praw.Reddit('fp_reddit_bot swan song!')
r.login(username="fp_analysis_bot", password="swagswag")
print "Logging in..."
already_done = []
i = 0

#######################################################
#WORK TIME
cur = conn.cursor()
already_done = []

while True:
    subreddit = r.get_front_page(limit=25)
    for submission in subreddit:
        print i
        
        if str(submission.subreddit) in already_done:
            sub = str(submission.subreddit)
            SQL = "UPDATE stats SET count = count + %s WHERE subreddit = %s;"
            data = (1,str(submission.subreddit))
            cur.execute(SQL, data)
            conn.commit() 
            SQL3 = "UPDATE stats SET date = CURRENT_DATE WHERE subreddit = %s;"
            data3 = (sub,)
            cur.execute(SQL3,data3)
            conn.commit()

        else:
            already_done.append(str(submission.subreddit))
             # table insert
            sub = str(submission.subreddit)
            SQL = "INSERT INTO stats (SUBREDDIT,COUNT) VALUES (%s,%s);" 
            data = (sub, 1)
            cur.execute(SQL,data)
            conn.commit()
            SQL2 = "UPDATE stats SET date = CURRENT_DATE WHERE subreddit = %s;"
            data2 = (sub,)
            cur.execute(SQL2,data2)
            conn.commit()

        # FINAL SORT

        #LOLLOLOLOLOLOL
        i = i + 1
        print "sleeping..."

    time.sleep(3600)
conn.close()





