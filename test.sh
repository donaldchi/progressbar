#!/bin/sh

isbn=$1

touch log.txt
for i in 1 2 3 4 5 6 7 8 9 10; do
   sleep 2
  echo $i >> log.txt
done

