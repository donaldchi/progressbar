#!/bin/sh

# tail -F log.txt ;
pID=$1
tail -f -n 1 --pid=$pID log.txt | while read line
#tail -f -n 1  log.txt | while read line
do 
  if [ -n "$line" ] ; then 
     echo $line
  fi
done
