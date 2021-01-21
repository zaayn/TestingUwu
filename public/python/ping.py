import requests
import time
import threading

def ping():
	fo = open("url.txt", "r")
	str = fo.read(100);
	x = requests.get(str)
	fo.close()
	print(threading.Thread().getName(), x.status_code)	

threads = []

for x in range(5):
    t = threading.Thread(target=ping())
    start_time = time.time()
    threads.append(t)
    t.start()
    for t in range(1):
    	response_time = time.time() - start_time
    	print("Response Time: %.3f seconds" % (response_time))

responsetime = [response_time]
maxTime = responsetime[0]
minTime = responsetime[0]

for i in range (0, len(responsetime), 1):
	maxTime = max(maxTime, responsetime[i])
	minTime = max(minTime, responsetime[i])

print("\nMaximum Response Time: %.3f seconds" % (maxTime))
print("Minimum Response Time: %.3f seconds" % (minTime))