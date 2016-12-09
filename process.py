#! /usr/bin/env python3
# -*- coding: utf-8 -*-
 
import os, sys, subprocess, shlex
from multiprocessing import Pool, Process, Queue

def f(logPID, q, scriptName, isbn):
	q.put([os.getpid()])
	os.system("sh "+scriptName+".sh "+logPID + " " + isbn)

def main():
	jobs = []
	q = Queue()

	isbn = sys.argv[1] 
		
	mainJob = Process(target=f, args=("",q,"test", isbn, ))
	jobs.append(mainJob)
	mainJob.start()

	logPID = str(q.get()[0])

	monitorJob = Process(target=f, args=(logPID,q,"monitor", "", ))
	jobs.append(monitorJob)
	monitorJob.start()
		
	for job in jobs:
		job.join()

main()
